import { configureEcho} from '@laravel/echo-vue';

// Could be added to 'main.ts' instead, it's only a separate file for now in case of needed configurations

configureEcho({
    broadcaster: "reverb",
});