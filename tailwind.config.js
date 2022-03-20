const plugin = require('tailwindcss/plugin')

module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {},
    },
    plugins: [
        plugin(function ({ addComponents }) {
            addComponents({
                '.alert': {
                    borderLeftWidth: "4px",
                    padding: "1rem",
                },
                '.alert-danger': {
                    backgroundColor: "#FFEDD5",
                    borderColor: "#F97316",
                    color: "#C64E1C",
                },
                '.alert-success': {
                    backgroundColor: "#DEF7EC",
                    borderColor: "#0E9F6E",
                    color: "#0D5C47",
                },
            })
        })
    ],
}
