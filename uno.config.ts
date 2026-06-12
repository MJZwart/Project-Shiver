import {defineConfig, presetWind, presetAttributify, presetTypography} from 'unocss';

export default defineConfig({
    presets: [presetWind(), presetAttributify(), presetTypography()],
    shortcuts: {
        // 
    },
    theme: {
        // colors: {
        //     highlight: '#646cff',
        // }
    },
    // Necessary for the dynamic classes
    safelist: [
        //
    ]
});