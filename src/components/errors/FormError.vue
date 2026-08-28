<template>
    <div>
        <slot />
        <div v-for="message in httpError">{{message}}</div>
    </div>
</template>

<script setup lang="ts">
import { computed } from 'vue';
import { errorBag } from '../../http';

    const {formComponent} = defineProps<{
        formComponent: string
    }>()

    const httpError = computed(() => {
        if (!errorBag.value) return;

        return errorBag.value[formComponent] ?? ''
    })
</script>
