import { defineConfig } from 'vite';
import { resolve } from 'path';

export default defineConfig({
  root: process.cwd(),
  build: {
    outDir: 'dist',
    emptyOutDir: true,
    manifest: true,
    rollupOptions: {
      input: {
        blocks: resolve(__dirname, 'assets/js/blocks-entry.js'),
      },
      output: {
        entryFileNames: 'js/[name].min.js',
        assetFileNames: (assetInfo) => {
          if (assetInfo.name && assetInfo.name.endsWith('.css')) {
            return 'css/blocks.min.css';
          }
          return 'assets/[name].[ext]';
        },
      },
    },
    cssCodeSplit: true,
  },
  css: {
    preprocessorOptions: {
      scss: {
        silenceDeprecations: ['legacy-js-api', 'import', 'global-builtin', 'color-functions'],
      },
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
  resolve: {
    alias: {
      '@': resolve(__dirname, 'assets'),
    },
  },
});
