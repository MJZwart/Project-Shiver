import {defineConfig, presetWind4, presetAttributify, presetTypography} from 'unocss';

export default defineConfig({
    presets: [presetWind4(), presetAttributify(), presetTypography()],
    shortcuts: {
        // 'win-border': 'inset-shadow-[#0a0a0a] shadow-[inset_-1px_-1px] shadow-[#0a0a0a] inset-shadow-[inset_1px_1px] inset-shadow-[#dfdfdf]'
        
        // inset-shadow-1px shadow="[inset_-1px_-1px_#0a0a0a,inset_1px_1px_#dfdfdf,inset_-2px_-2px_gray,inset_2px_2px_white]"',
        'win-header': 'bg-gradient from-[#000080] to-[#1084d0] bg-gradient-to-r',
        // 'win-header': 'bg-gradient-from-navy bg-gradient-to-[#1084d0]',
    },
    theme: {
        colors: {
            win: {
                teal: '#008282',
                blue: '#000082',
                grey: '#c3c3c3',
                'light-grey': '#dedede',
            }
        }
    },
    // Necessary for the dynamic classes
    safelist: [
        //
    ]
});