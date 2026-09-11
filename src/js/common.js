import Utility from './utility';
import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger'

import 'overlayscrollbars/overlayscrollbars.css';
import { OverlayScrollbars } from 'overlayscrollbars';

import ScrollHint from 'scroll-hint';
import 'scroll-hint/css/scroll-hint.css';

import Swiper from 'swiper';
import { Navigation, Pagination, Autoplay, Scrollbar, EffectFade } from 'swiper/modules';
import 'swiper/css/bundle'
Swiper.use([Navigation, Pagination, Autoplay, Scrollbar, EffectFade]);

/*
 * common
 * 共通変数と関数
 */
export default class common {

    constructor() {
        gsap.registerPlugin(ScrollTrigger);
    }

    /*
     * load
     * 各処理を初期化・実行
     */
    load() {
        const osInstance = OverlayScrollbars(document.querySelector('body'), {
            showNativeOverlaidScrollbars: true,
        });

        this.loader();
        this.scrollEvent();
        this.setDeviceClassToBody();
        this.globalMenu();
        // this.megaMenu();
        this.smoothScroll();
        // this.cMouseStalker();
        this.jsSplitText();
        this.jsClone();
        // this.jsStickySection();
        this.jsAccordion();
        this.jsTab();
        this.jsScrollX();
        this.jsSwiper();
        this.jsCardSlider();
        this.isSectionDark();
        this.isVisible();
        this.isVisibleType();
    }

    /*
     * reload
     * ページ遷移後の再実行用（barba等との連携を想定）
     */
    reload() {
    }

    /*
     * loader
     * ローディング処理
     */
    loader() {
        const loadedClass = 'windowLoaded';
        const classNameScroll = 'is-scrolled';
        const marginScrolled = 300;

        window.addEventListener('load', ()=>{
            document.body.classList.add(loadedClass);
        })

        const handleScroll = () => {
            if (window.scrollY > marginScrolled) {
                document.body.classList.add(classNameScroll);
            } else {
                document.body.classList.remove(classNameScroll);
            }
        };

        window.addEventListener('scroll', handleScroll);
        window.addEventListener('resize', handleScroll);
        window.addEventListener('orientationchange', handleScroll);
    }

    /*
     * scrollEvent
     * スクロール動作
     */
    scrollEvent() {
        let defPos = 0;
        let ticking = false;

        window.addEventListener('scroll', () => {
            if (!ticking) {
                ticking = true;
                requestAnimationFrame(() => {
                    addBodyScrollClass();
                    ticking = false;
                });
            }
        });

        function addBodyScrollClass() {
            let currentPos = window.scrollY;
            if (currentPos > defPos) {
                if (currentPos >= window.innerHeight / 2) {
                    document.body.classList.add('scrollDown');
                    document.body.classList.remove('scrollUp');
                }
            } else {
                document.body.classList.remove('scrollDown');
                document.body.classList.add('scrollUp');
            }
            defPos = currentPos;
        }

        const footer = document.querySelector('.l-footer');
        if (footer) {
            ScrollTrigger.create({
                trigger: footer,
                start: 'top bottom',
                onEnter: () => document.body.classList.add('is-footer-show'),
                onLeaveBack: () => document.body.classList.remove('is-footer-show'),
            });
        }
    }

    /*
     * globalMenu
     * グローバルメニューの動作
     */
    globalMenu() {

        const classNameNavOpen = 'is-nav-open';
        const classNameNavClose = 'is-nav-closing';
        const header = document.querySelector('.l-header');
        const headerMenu = document.querySelector('.l-header-menu');

        if (!header || !headerMenu) return;

        // ドロワーの中身を順に送り出すための順番付け（見た目は _l-header-drawer.scss 側）
        const drawerItems = document.querySelectorAll('.l-header-drawer__item');

        headerMenu.addEventListener('click', () => {
            setNavHeight();
            headerMenu.classList.toggle(classNameNavOpen);
            if (headerMenu.classList.contains(classNameNavOpen)) {
                setDrawerOrder();
                document.body.classList.add(classNameNavOpen);
            } else {
                navClose();
            }
        });

        /*
         * ドロワーの中身に出る順番（--i）を振る
         * 消えている（display:none）ものに番号を使わせると、その順番のぶんだけ間が空いて見えるので、
         * 出ているものだけを数える
         */
        function setDrawerOrder() {
            let order = 0;
            drawerItems.forEach(item => {
                const shown = window.getComputedStyle(item).display !== 'none';
                item.style.setProperty('--i', shown ? order++ : 0);
            });
        }

        const headerLinks = header.querySelectorAll('a');
        headerLinks.forEach(link => {
            link.addEventListener('click', () => {
                headerMenu.classList.remove(classNameNavOpen);
                navClose();
            });
        });

        function setNavHeight() {
            // 任意で実装
            // headerNav.style.height = `${window.innerHeight - header.offsetHeight}px`;
        }

        // ナビゲーションを閉じる処理
        function navClose() {
            document.body.classList.remove(classNameNavOpen);
            document.body.classList.add(classNameNavClose);
            setTimeout(() => {
                document.body.classList.remove(classNameNavClose);
            }, 600);
        }

        // Escキーでメニューを閉じる
        window.addEventListener('keydown', (event) => {
            if (event.key === 'Escape' || event.keyCode === 27) {
                headerMenu.classList.remove(classNameNavOpen);
                navClose();
            }
        });
    }

    /*
     * megaMenu
     * メガメニューのホバー表示制御
     */
    megaMenu() {
        const megaMenuBtns = document.querySelectorAll('.js-mega-menu');
        const megaMenus = document.querySelectorAll('.l-header-megaMenu__nav');
        const lMain = document.querySelector('.l-main');

        function clearActive() {
            megaMenuBtns.forEach(btn => btn.classList.remove('is-active'));
            megaMenus.forEach(menu => menu.classList.remove('is-active'));
        }

        megaMenuBtns.forEach(btn => {
            btn.addEventListener('mouseenter', () => {
                clearActive();
                btn.classList.add('is-active');
                const target = btn.dataset.content;
                const targetMenu = document.querySelector(`.l-header-megaMenu__nav[data-content="${target}"]`);
                if (targetMenu) targetMenu.classList.add('is-active');
            });
        });

        const header = document.querySelector('.l-header');
        if (header) {
            const otherInteractives = header.querySelectorAll(
                'a:not(.jsMegaMenu):not(.cm-nav-mega a), button:not(.jsMegaMenu):not(.cm-nav-mega button)'
            );
            otherInteractives.forEach(el => {
                el.addEventListener('mouseenter', clearActive);
            });
        }

        if (lMain) {
            lMain.addEventListener('mouseenter', clearActive);
        }
    }

    /*
     * smoothScroll
     * アンカーリンクのスムーススクロール
     */
    smoothScroll() {

        const anchors = document.querySelectorAll('a[data-scroll-anchor]:not(.noscroll)');

        anchors.forEach(anchor => {
            anchor.addEventListener('click', (e) => {
                e.preventDefault();

                const href = anchor.getAttribute('href');
                const index = href.indexOf('#');
                if (index === -1) return;

                const targetSelector = href.slice(index);
                const target = document.querySelector(targetSelector);
                if (!target) return;

                const rootFontSize = parseFloat(getComputedStyle(document.documentElement).fontSize);
                const headerHeight = parseFloat(getComputedStyle(document.documentElement).getPropertyValue('--header-height')) * rootFontSize || 0;
                const targetPos = target.getBoundingClientRect().top + window.pageYOffset - headerHeight;
                const currentScroll = window.pageYOffset;
                let scroll = Math.abs(currentScroll - targetPos);
                let duration = 0.7 * scroll;

                if (duration > 300) {
                    duration = 300;
                }

                window.scrollTo({
                    top: targetPos,
                    behavior: 'smooth'
                });

                setTimeout(() => {
                    history.pushState(null, '', href);
                }, duration);
            });
        });
    }

    /*
     * cMouseStalker
     * マウスストーカーの追従アニメーション
     */
    cMouseStalker() {
        const btn = document.querySelector('.c-btn-stalker');
        const circle = document.querySelector('.c-btn-stalker__circle');
        const ico = document.querySelector('.c-btn-stalker__ico');
        const stalkerTriggers = document.querySelectorAll('.js-stalker-show');

        if (btn && ScrollTrigger.isTouch !== 1) {
            document.addEventListener('mousemove', (e) => {
                const shift = btn.offsetWidth / 2;

                gsap.to(circle, {
                    x: e.clientX - shift,
                    y: e.clientY - shift,
                    ease: 'power1.out',
                });

                gsap.to(ico, {
                    x: e.clientX - shift,
                    y: e.clientY - shift,
                    ease: 'power1.out',
                    delay: 0.005,
                });
            });

            stalkerTriggers.forEach(trigger => {
                trigger.addEventListener('mouseover', () => {
                    btn.classList.add('on-stalker-show');
                });
                trigger.addEventListener('mouseout', () => {
                    btn.classList.remove('on-stalker-show');
                });
            });
        }
    }

    /*
     * jsClone
     * .js-clone 要素を data-clone-num の数だけ複製
     */
    jsClone() {
        const elements = document.querySelectorAll('.js-clone');

        elements.forEach(el => {
            const cloneNum = parseInt(el.dataset.cloneNum, 10) || 1;

            for (let i = 0; i < cloneNum; i++) {
                const clone = el.cloneNode(true);
                clone.setAttribute('aria-hidden', 'true');
                el.parentNode.insertBefore(clone, el.nextSibling);
            }
        });
    }

    /*
     * jsSplitText
     * .js-split-text の文字を1文字ずつ span で分割
     */
    jsSplitText() {
        const domList = document.querySelectorAll('.js-split-text');

        if (domList.length) {
            domList.forEach(el => {
                Utility.convertSplitSpan(el);
            });
        }
    }

    /*
     * jsStickySection
     * PC時にサイドナビをスティッキー固定し、現在セクションをハイライト
     */
    jsStickySection() {
        const container = document.querySelector('.js-sticky-section__content');
        const pin = document.querySelector('.js-sticky-section__aside');
        const asideLis = document.querySelectorAll('.js-sticky-section__aside li');
        const sections = document.querySelectorAll('.js-sticky-section__content section');

        if (container && pin && Utility.isPC()) {
            window.addEventListener('load', () => {
                const pinUl = pin.querySelector('ul');
                const pinHeight = pinUl ? pinUl.offsetHeight : pin.offsetHeight;
                const headerHeightValue = getComputedStyle(document.documentElement)
                    .getPropertyValue('--header-height')
                    .trim();

                const headerHeight = headerHeightValue.endsWith('rem')
                    ? parseFloat(headerHeightValue) * parseFloat(getComputedStyle(document.documentElement).fontSize)
                    : parseFloat(headerHeightValue);

                ScrollTrigger.create({
                    trigger: container,
                    start: `top top+=${headerHeight}`,
                    end: `bottom-=${pinHeight} top+=${headerHeight}`,
                    pin: pin,
                    pinSpacing: false,
                    anticipatePin: 1,
                    markers: false,
                });

                // 現在地表示
                sections.forEach((section, index) => {
                    ScrollTrigger.create({
                        trigger: section,
                        start: `top top+=${headerHeight}`,
                        end: `bottom top+=${headerHeight}`,
                        markers: false,
                        onEnter: () => {
                            asideLis.forEach(li => li.classList.remove('is-current'));
                            if (asideLis[index]) {
                                asideLis[index].classList.add('is-current');
                            }
                        },
                        onEnterBack: () => {
                            asideLis.forEach(li => li.classList.remove('is-current'));
                            if (asideLis[index]) {
                                asideLis[index].classList.add('is-current');
                            }
                        },
                    });
                });
            });
        }
    }

    /*
     * jsAccordion
     * .js-accordion クリックで次の要素を開閉（GSAP アニメーション）
     */
    jsAccordion() {
        document.querySelectorAll('.js-accordion').forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.preventDefault();
                const isFlex = btn.hasAttribute('data-accordion-flex');
                const content = btn.nextElementSibling;
                if (!content) return;

                btn.classList.toggle('is-open');
                btn.setAttribute('aria-expanded', btn.classList.contains('is-open'));

                if (btn.classList.contains('is-open')) {
                    const display = isFlex ? 'flex' : 'block';
                    gsap.set(content, { display, height: 0, overflow: 'hidden' });
                    gsap.to(content, {
                        height: 'auto',
                        duration: 0.3,
                        ease: 'power2.out',
                        onComplete: () => gsap.set(content, { overflow: '' }),
                    });
                } else {
                    gsap.to(content, {
                        height: 0,
                        duration: 0.3,
                        ease: 'power2.out',
                        onComplete: () => gsap.set(content, { display: 'none', overflow: '' }),
                    });
                }
            });
        });
    }

    /*
     * jsCardSlider
     * .js-card-slider の中の .swiper（カードを横に並べて送る。トップのお客様の声）。
     * SPは1枚（300）を中央に置いて左右をのぞかせ、PCは 550 を左端からそろえて右へはみ出させる。
     * 前後ボタンは .js-card-slider-prev / .js-card-slider-next
     */
    jsCardSlider() {
        document.querySelectorAll('.js-card-slider').forEach(wrapper => {
            const elm = wrapper.querySelector('.swiper');
            if (!elm) return;

            // ループは「見えている枚数 × 2」ほどの枚数が要る（3枚だと Swiper が警告してループしない）。
            // 足りないときは同じ並びを複製して足す。複製は読み上げから外す（カードの中にリンクは無い）
            const list = elm.querySelector('.swiper-wrapper');
            const originals = [...list.children];
            while (originals.length && list.children.length < 6) {
                originals.forEach(slide => {
                    const clone = slide.cloneNode(true);
                    clone.setAttribute('aria-hidden', 'true');
                    list.appendChild(clone);
                });
            }

            new Swiper(elm, {
                slidesPerView: 'auto',
                spaceBetween: 10,
                centeredSlides: true,
                loop: true,
                speed: 600,
                navigation: {
                    prevEl: wrapper.querySelector('.js-card-slider-prev'),
                    nextEl: wrapper.querySelector('.js-card-slider-next'),
                },
                breakpoints: {
                    1024: {
                        spaceBetween: 30,
                        centeredSlides: false,
                    },
                },
            });
        });
    }

    /*
     * jsScrollX
     * .js-scroll-x（.c-scroll-x__inner）の横スクロール。
     * ScrollHint で「スクロールできます」を出し、下の細いバー（.c-scroll-x__thumb）を scrollLeft に合わせて動かす。
     * 送る必要が無いとき（PC）は親の .c-scroll-x から is-scrollable を外してバーを隠す。
     */
    jsScrollX() {
        const els = document.querySelectorAll('.js-scroll-x');
        if (!els.length) return;

        new ScrollHint('.js-scroll-x', {
            i18n: { scrollable: 'スクロールできます' },
        });

        els.forEach(el => {
            const wrap = el.closest('.c-scroll-x');
            const thumb = wrap?.querySelector('.c-scroll-x__thumb');
            if (!thumb) return;

            const update = () => {
                const scrollable = el.scrollWidth > el.clientWidth + 1;
                wrap.classList.toggle('is-scrollable', scrollable);
                if (!scrollable) return;
                // つまみの幅 = 見えている割合。位置は「つまみの幅」基準の % なので scrollLeft ÷ 見えている幅
                thumb.style.width = `${el.clientWidth / el.scrollWidth * 100}%`;
                thumb.style.transform = `translateX(${el.scrollLeft / el.clientWidth * 100}%)`;
            };

            el.addEventListener('scroll', update, { passive: true });
            window.addEventListener('resize', update);
            // 中の画像が読み込まれて幅が決まってから測り直す
            el.querySelectorAll('img').forEach(img => {
                if (!img.complete) img.addEventListener('load', update, { once: true });
            });
            update();
        });
    }

    /*
     * jsTab
     * .js-tab 内のタブ切り替え
     */
    jsTab() {
        document.querySelectorAll('.js-tab').forEach(container => {
            const tabs = container.querySelectorAll('.js-tabBtn');
            const contents = container.querySelectorAll('.js-tabContent');

            tabs.forEach((tab, index) => {
                tab.addEventListener('click', () => {
                    tabs.forEach(t => t.classList.remove('is-active'));
                    contents.forEach(c => c.classList.remove('is-active'));

                    tab.classList.add('is-active');
                    contents[index].classList.add('is-active');
                });
            });

            if (tabs.length > 0 && contents.length > 0) {
                tabs[0].classList.add('is-active');
                contents[0].classList.add('is-active');
            }
        });
    }

    /*
     * jsSwiper
     * .js-swiper を Swiper で初期化（ページネーション・ナビ・自動再生に対応）
     */
    jsSwiper() {
        const swiperAll = document.querySelectorAll('.js-swiper');

        swiperAll.forEach(wrapper => {
            const elm = wrapper.querySelector('.swiper');
            if (!elm) return;

            const paginationEl = wrapper.querySelector('.swiper-pagination');
            const prevEl = wrapper.querySelector('.swiper-prev');
            const nextEl = wrapper.querySelector('.swiper-next');

            const isFade = wrapper.hasAttribute('data-fade');

            const mySwiper = new Swiper(elm, {
                loop: true,
                loopAdditionalSlides: wrapper.querySelectorAll('.swiper-slide').length,
                slidesPerView: 1,
                spaceBetween: 0,
                speed: 800,
                ...(isFade && {
                    effect: 'fade',
                    fadeEffect: { crossFade: true },
                }),
                autoplay: wrapper.dataset.autoplay
                    ? {
                        delay: 4000,
                        disableOnInteraction: false,
                    }
                    : false,
                pagination: paginationEl
                    ? {
                        el: paginationEl,
                        clickable: true,
                    }
                    : false,
                navigation: prevEl && nextEl
                    ? {
                        prevEl,
                        nextEl,
                    }
                    : false,
                on: {
                    init() {
                        ScrollTrigger.refresh();
                    }
                },
            });
        })
    }

    /*
     * isSectionDark
     * .is-section-dark（写真や濃い地のセクション）にヘッダーが重なっている間、body に is-header-dark を付ける。
     * ヘッダーは is-header-dark の間だけ白抜きのロゴ、それ以外は濃いロゴ（_l-header.scss）
     */
    isSectionDark() {
        const sections = document.querySelectorAll('.is-section-dark');
        const header = document.querySelector('.l-header');
        if (!sections.length || !header) return;

        // 境目はヘッダー（position: fixed）の縦の中央。SP 20 + 40 / 2・PC 25 + 59 / 2
        const center = () => header.offsetTop + header.offsetHeight / 2;

        // 重なっているかは全セクションから毎回まとめて判定する。
        // 隣り合う濃いセクション（技術力の帯 → フッターなど）で、足す・外すの順番によってロゴがちらつかないように
        let raf = 0;
        const update = () => {
            cancelAnimationFrame(raf);
            raf = requestAnimationFrame(() => {
                document.body.classList.toggle('is-header-dark', triggers.some(t => t.isActive));
            });
        };

        const triggers = [...sections].map(section => ScrollTrigger.create({
            trigger: section,
            start: () => `top top+=${center()}`,
            end: () => `bottom top+=${center()}`,
            onToggle: update,
            onRefresh: update,
        }));
        update();
    }

    /*
     * isVisible
     * .js-visible がスクロールで画面内に入ると is-visible クラスを付与
     */
    isVisible() {
        const elements = document.querySelectorAll('.js-visible');
        window.addEventListener("load", () => {
            elements.forEach(el => {
                const startOffset = el.dataset.start ?? 0;
                const delay = el.dataset.delay ? parseFloat(el.dataset.delay) * 1000 : 0;
                ScrollTrigger.create({
                    trigger: el,
                    start: `top bottom-=${startOffset}%`,
                    once: true,
                    invalidateOnRefresh: true,
                    markers: false,
                    onEnter() {
                        requestAnimationFrame(() => {
                            if (delay) {
                                setTimeout(() => el.classList.add('is-visible'), delay);
                            } else {
                                el.classList.add('is-visible');
                            }
                        });
                    },
                });
            });
        });
    }

    /*
     * isVisibleType
     * .js-visible-type の文字を分割し、スクロールで1文字ずつフェードイン
     */
    isVisibleType() {
        const domList = document.querySelectorAll('.js-visible-type');

        if (domList.length) {
            domList.forEach(el => {
                Utility.convertSplitSpan(el);
            });

            domList.forEach(el => {
                const spans = el.querySelectorAll('span');

                gsap.set(spans, { opacity: 0, y: '20%' });

                gsap.to(spans, {
                    scrollTrigger: {
                        trigger: el,
                        start: 'top bottom-=20%',
                    },
                    delay: 0.5,
                    opacity: 1,
                    y: '0%',
                    stagger: 0.03,
                    ease: 'power3.out',
                });
            });
        }
    }

    /*
     * setDeviceClassToBody
     * デバイスサイズによるクラス付与
     */
    setDeviceClassToBody() {
        const updateBodyClass = () => {
            const body = document.body;

            body.classList.toggle('isSP', Utility.isSP());
            body.classList.toggle('isTAB', Utility.isTAB());
            body.classList.toggle('isPC', Utility.isPC());
        };

        window.addEventListener('load', updateBodyClass);
        window.addEventListener('resize', updateBodyClass);
        window.addEventListener('orientationchange', updateBodyClass);
    }

}
