const DEFUALT_OPTIONS = {
    autoClose: 5000,
    position: "top-right",
    onClose: () => { },
    canClose: true,
    showProgress: true,
    customClass: '',
}

export default class Toast {
    #toastElem
    #autoCloseTimeout
    #autoClose
    #removeBinded
    #visibleSince = 0


    constructor(options) {
        this.#toastElem = document.createElement('div')
        this.#toastElem.classList.add('toast-msg')
        requestAnimationFrame(() => {
            this.#toastElem.classList.add('show');
        })
        this.#visibleSince = new Date()
        this.#removeBinded = this.remove.bind(this)
        this.update({ ...DEFUALT_OPTIONS, ...options })
    }
    set position(value) {
        const currentContainer = this.#toastElem.parentElement
        const selector = `.toast-msg-container[data-position="${value}"]`
        const container = document.querySelector(selector) || createContainer(value);
        container.append(this.#toastElem)
        if (currentContainer == null || currentContainer.hasChildNodes()) return
        currentContainer.remove()
    }

    set text(value) {
        this.#toastElem.textContent = value;
    }

    set autoClose(value) {
        this.#autoClose = value
        if (value === false) return
        if (this.#autoCloseTimeout != null) clearTimeout(this.#autoCloseTimeout)
        this.#autoCloseTimeout = setTimeout(() => { this.remove() }, value)
    }

    set canClose(value) {
        this.#toastElem.classList.toggle('can-close', value)
        if (value) {
            this.#toastElem.addEventListener('click', this.#removeBinded)
        } else {
            this.#toastElem.removeEventListener('click', this.#removeBinded)

        }
    }

    set showProgress(value) {
        this.#toastElem.classList.toggle('progress', value)
        this.#toastElem.style.setProperty('--progress', 1)
        if (value) {
            setInterval(() => {
                const timeVisible = new Date() - this.#visibleSince
                this.#toastElem.style.setProperty('--progress', timeVisible / this.#autoClose)
            }, 10)
        }
    }

    set customClass(value) {
        this.#toastElem.classList.add(value)
    }

    update(options) {
        Object.entries(options).forEach(([key, value]) => {
            this[key] = value;
        })
    }
    remove() {
        const container = this.#toastElem.parentElement
        this.#toastElem.classList.remove('show')
        this.#toastElem.addEventListener('transitionend', () => {
            this.#toastElem.remove()
            if (container.hasChildNodes()) return
            container.remove()
        })
        this.onClose()
    }
}

function createContainer(position) {
    const container = document.createElement('div');
    container.classList.add('toast-msg-container');
    container.dataset.position = position;
    document.body.append(container);
    return container;
}