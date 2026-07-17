<template>
    <div class="anim" :style="{bottom: height}" ref="marQueezNutz">
        {{item}}
    </div>
</template>

<script setup>
import { computed, onMounted, useTemplateRef } from 'vue';

    const {item} = defineProps(['item']);

    const height = computed(() => `${item.yVal}vh`)

    const marQueezNutz = useTemplateRef('marQueezNutz');

    const emit = defineEmits(['done'])

    onMounted(() => {
        marQueezNutz.value.addEventListener("animationend", (_) => {
            emit('done');
        })
        console.log(item);
    })
</script>

<style>

    .anim {
        position: absolute;
        animation: 10s linear 0s xdd;
    }

    @keyframes xdd {
        from {
            transform: translateX(-100%);
        }
        to {
            transform: translateX(100vw);
        }
    }

</style>