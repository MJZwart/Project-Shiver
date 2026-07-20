<template>
    <div absolute :class="[leftClass, topClass]" flex flex-col class="fade-in-out" items-center>
        <PawPrint text-48 />
        {{ username }} poked you
    </div>
</template>

<script setup lang="ts">
import { computed, onMounted, ref } from 'vue';
import PawPrint from '../assets/icons/PawPrint.vue';
import { getRandomInt } from '../helpers/randomHelper.ts';

const { username } = defineProps<{ username: string }>();

const pawSize = 192;

const x = ref();
const y = ref();

const maxX = computed(() => {
    if (!window.visualViewport) return 0;
    return window.visualViewport?.width - pawSize;
});
const maxY = computed(() => {
    if (!window.visualViewport) return 0;
    return window.visualViewport?.height - pawSize;
});

const getRandomPosition = () => {
    x.value = getRandomInt(0, maxX.value);
    y.value = getRandomInt(0, maxY.value);
}

const leftClass = computed(() => {
    return `left-${x.value}px`;
});

const topClass = computed(() => {
    return `top-${y.value}px`;
});

onMounted(() => {
    getRandomPosition();
});
</script>