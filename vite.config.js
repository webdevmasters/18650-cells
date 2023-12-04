import {defineConfig} from 'vite';
import laravel from 'laravel-vite-plugin';
import {viteStaticCopy} from 'vite-plugin-static-copy'

export default defineConfig({
    build: {
        manifest: true,
        // assetsDir: 'js',
        rtl: true,
        outDir: 'public/build/',
        cssCodeSplit: true,
        rollupOptions: {
            output: {
                assetFileNames: (css) => {
                    if (css.name.split('.').pop() === 'css') {
                        return 'css/' + `[name]` + '.min.' + 'css';
                    } else {
                        return 'icons/' + css.name;
                    }
                },
                entryFileNames: 'js/' + `[name]` + `.js`,
            },
        },
    },
    plugins: [
        laravel({
            input: [
                'resources/css/admin/tabler/tabler.css',
                'resources/css/admin/tabler/tabler-flags.css',
                'resources/css/admin/tabler/tabler-payments.css',
                'resources/css/admin/tabler/tabler-vendors.css',
                'resources/css/admin/datatables/datatables.css',
                'resources/css/admin/filepond/filepond.css',
                'resources/css/admin/filepond/filepond-plugin-image-preview.css',
                'resources/css/admin/toastr/toastr.css',
                'resources/css/admin/sweet-alert/sweetalert.css',

                'resources/js/admin/tabler.js',
            ],
            refresh: true,
        }),
        viteStaticCopy({
            targets: [
                {
                    src: 'resources/js/admin/libs',
                    dest: ''
                },
                {
                    src: 'resources/img',
                    dest: ''
                },
                {
                    src: 'resources/static',
                    dest: ''
                },
                {
                    src: 'resources/fonts',
                    dest: ''
                },
            ]
        }),
    ],
});
