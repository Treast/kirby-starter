// vite.config.js
import { defineConfig, loadEnv } from "vite";
import kirby from "vite-plugin-kirby";

export default defineConfig(({ command, mode }) => {
  process.env = { ...process.env, ...loadEnv(mode, process.cwd()) };

  return {
    base: mode === "development" ? "/" : "/dist/",
    build: {
      outDir: "public/dist",
      assetsDir: "assets",
      rollupOptions: {
        input: ["assets/js/app.js"],
      },
    },
    server: {
      cors: true,
      hmr: { host: process.env.HOST },
      origin: process.env.HOST,
      // proxy: {
      //   "/": "http://localhost:4000",
      // },
    },
    plugins: [
      kirby({
        // By default Kirby's templates, snippets, controllers, models, layouts and
        // everything inside the content folder will be watched and a full reload
        // triggered. All paths are relative to Vite's root folder.
        watch: [
          "./site/(templates|snippets|controllers|models|layouts)/**/*.php",
          "./content/**/*",
        ],

        // Where the automatically generated `vite.config.php` file should be
        // placed. This has to match Kirby's config folder!
        kirbyConfigDir: "./site/config", // default
      }),
    ],
  };
});
