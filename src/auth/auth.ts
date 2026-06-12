import { computed } from "vue";

// Have user in a ref, accessible through computed

export const isLoggedIn = computed(() => {
    return true;
});