let mix = require("laravel-mix");

mix
  .setPublicPath("public")
  .js("resources/js/app.jsx", "public/js")
  .postCss("resources/css/app.css", "public/css", [require("tailwindcss")])
  .react("public");
