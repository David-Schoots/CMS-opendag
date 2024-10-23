// Import Alpine.js
import Alpine from 'alpinejs'

// Start Alpine.js
Alpine.start()

/* // Function for text rotator
function textRotator() {
    return {
        texts: ['Aanmelden', 'Welkom', 'Schrijf je in'],
        currentIndex: 0,
        displayText: '',
        isDeleting: false,
        charIndex: 0,
        typingSpeed: 150,
        deletingSpeed: 100,
        pauseTime: 1000,

        init() {
            this.type();
        },
        type() {
            let currentText = this.texts[this.currentIndex];

            if (this.isDeleting) {
                this.displayText = currentText.substring(0, this.charIndex - 1);
                this.charIndex--;

                if (this.charIndex === 0) {
                    this.isDeleting = false;
                    this.currentIndex = (this.currentIndex + 1) % this.texts.length;
                }
            } else {
                this.displayText = currentText.substring(0, this.charIndex + 1);
                this.charIndex++;

                if (this.charIndex === currentText.length) {
                    this.isDeleting = true;
                    setTimeout(() => this.type(), this.pauseTime);
                    return;
                }
            }

            setTimeout(() => this.type(), this.isDeleting ? this.deletingSpeed : this.typingSpeed);
        }
    };
}

// Attach the textRotator function to the global window object
window.textRotator = textRotator;
 */