
/*
 * utility
 * 静的ユーティリティメソッド
 */
export default class Utility {

    constructor() {

    }

    static isSP() {
        return window.matchMedia('screen and (min-width: 320px) and (max-width: 749px)').matches
    }
    static isTAB() {
        return window.matchMedia('screen and (min-width: 750px) and (max-width: 1023px)').matches
    }
    static isPC() {
        return window.matchMedia('screen and (min-width: 1024px)').matches
    }

    static convertSplitSpan(selector) {
        const target = convertElement(selector)
        const nodes = [...target.childNodes];
        let spanWrapText = ""

        nodes.forEach((node) => {
            if (node.nodeType == 3) { // テキストノード
                const text = node.textContent.replace(/\r?\n/g, '');
                spanWrapText = spanWrapText + text.split('').reduce((acc, v) => {
                    v = v !== ' ' ? v : '&nbsp;'
                    return acc + `<span>${v}</span>`
                }, "");
            } else {
                spanWrapText = spanWrapText + node.outerHTML
            }
        })
        target.innerHTML = spanWrapText

        function convertElement(element) {
            if (element instanceof HTMLElement) {
                return element
            }
            return document.querySelector(element);
        }
    }
}
