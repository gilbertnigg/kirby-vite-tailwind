import { defineConfig, loadEnv } from 'vite'
import kirby from 'vite-plugin-kirby'

export default defineConfig(({ command, mode }) => {
	const siteUrl = loadEnv(mode, process.cwd(), '').VITE_SITE_URL

	if (command === 'serve' && !siteUrl) {
		throw new Error('VITE_SITE_URL is not set. Run `cp .env.example .env` and adjust the URL.')
	}

	return {
		base: mode === 'development' ? '/' : '/assets/build/',
		publicDir: false,

		server: {
			// Open the Kirby site served by Herd, not Vite's asset-only server.
			open: siteUrl,
			// The Herd page loads assets from localhost:5173, a different origin.
			cors: { origin: siteUrl },
		},

		build: {
			outDir: 'public/assets/build',
			assetsDir: 'assets',
			manifest: true,
			rollupOptions: {
				input: ['src/css/app.css', 'src/js/app.js'],
			},
		},

		plugins: [
			kirby({
				watch: [
					'site/(templates|snippets|controllers|models|layouts|plugins)/**/*.php',
					'data/storage/content/**/*',
				],
				kirbyConfigDir: 'site/config',
			}),
		],
	}
})
