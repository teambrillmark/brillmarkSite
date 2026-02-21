import { defineConfig } from "vite";
import { resolve } from "path";

export default defineConfig({
  // Build configuration
  build: {
    // Output to dist directory to match your current setup
    outDir: "dist",
    emptyOutDir: true,

    // Generate manifest for cache busting
    manifest: true,

    // Multiple entry points
    rollupOptions: {
      input: {
        style: resolve(__dirname, "assets/scss/style.scss"), // Add old SCSS compilation
      },
      output: {
        assetFileNames: (assetInfo) => {
          if (assetInfo.name?.endsWith(".css")) {
            return "css/[name].min.css";
          }
          return "assets/[name].[ext]";
        },
      },
    },

    // Enable code splitting for separate CSS files
    cssCodeSplit: true,
  },

  // CSS configuration
  css: {
    preprocessorOptions: {
      scss: {
        // Include Bootstrap SCSS from node_modules
        includePaths: ["node_modules/bootstrap/scss"],
        // Suppress deprecation warnings from Bootstrap
        silenceDeprecations: ["legacy-js-api", "import", "global-builtin", "color-functions"],
      },
    },
    postcss: {
      plugins: [require("autoprefixer")],
    },
  },

  // Development server configuration
  server: {
    // Set to your local development URL
    host: "localhost",
    port: 3000,

    // Hot Module Replacement
    hmr: {
      host: "localhost",
    },

    // Watch for changes in all relevant files
    watch: {
      usePolling: true,
      interval: 1000,
      include: ["**/*.php", "assets/**/*.scss"],
      ignored: ["node_modules/**", "dist/**"],
    },
  },

  // Resolve configuration
  resolve: {
    alias: {
      "@": resolve(__dirname, "assets"),
    },
  },

  // Define global constants
  define: {
    __DEV__: JSON.stringify(process.env.NODE_ENV === "development"),
  },
});
