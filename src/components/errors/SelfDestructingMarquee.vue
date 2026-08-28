<template>
    <div class="anim" :style="{bottom: height, animationDuration: duration}" ref="marQueezNutz">
        {{item.msg}}
    </div>
</template>

<script setup lang="ts">
import { computed, onMounted, useTemplateRef } from 'vue';


    const {item} = defineProps(['item']);

    const height = computed(() => `${item.yVal}vh`)

    const duration = computed(() => `${item.speed}s`)

    const marQueezNutz = useTemplateRef('marQueezNutz');

    const emit = defineEmits(['done'])

    onMounted(() => {
        // TODO: Needs a more robust solution. Maybe a watcher? At least something that ensures the event is added.
        marQueezNutz.value.addEventListener("animationend", (_) => {
            emit('done');
        })
    })
</script>

<style>

    .anim {
        position: absolute;
        animation: 10s linear 0s leftToRight;
    }

    @keyframes leftToRight {
        from {
            transform: translateX(-100%);
        }
        to {
            transform: translateX(100vw);
        }
    }

</style>