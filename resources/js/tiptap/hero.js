import { Node, mergeAttributes } from "@tiptap/core";

const Hero = Node.create({
    name: "hero",

    group: "block",

    content: "block+",

    addOptions() {
        return {
            colors: [
                'gray_light',
                'gray',
                'gray_dark',
                'primary',
                'secondary',
                'tertiary',
                'accent'
            ],
            HTMLAttributes: {
                class: "hero-block"
            }
        }
    },

    addAttributes() {
        return {
            color: {
                default: null,
                parseHTML: (element) => element.getAttribute('data-color'),
                renderHTML: (attributes) => {
                    if (! attributes.color) {
                        return {}
                    }

                    return {
                        'data-color': attributes.color,
                    }
                }
            }
        }
    },

    parseHTML() {
        return [
            {
                tag: 'div',
                getAttrs: (element) => element.classList.contains('hero-block')
            }
        ]
    },

    renderHTML({ node, HTMLAttributes}) {
        return [
            'div',
            mergeAttributes(this.options.HTMLAttributes, HTMLAttributes),
            0
        ]
    },

    addCommands() {
        return {
            toggleHero: (attributes) => ({ commands }) => {
                if (! this.options.colors.includes(attributes.color)) {
                    return false
                }

                return commands.toggleWrap(this.name, attributes)
            }
        }
    }
})

export default Hero
