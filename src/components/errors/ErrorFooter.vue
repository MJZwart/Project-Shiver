<template>
    <div fixed bottom-0 w-full flex>
        <SelfDestructingMarquee v-for="item in movingErrorList" :item="item" @done="kaboom(item)" :key="item.id"/>
    </div>
</template>

<script setup lang="ts">
import { onMounted, ref, useTemplateRef, watch, type Ref } from 'vue';
import { errorBag } from '../../http.ts';
import SelfDestructingMarquee from './SelfDestructingMarquee.vue';

const movingErrorList = ref<{[key: string]: marqueeErrorMessage}>({});

type marqueeErrorMessage = {
    id: number;
    msg: string;
    yVal: number;
    speed: number
}

const kaboom = (item: marqueeErrorMessage) => {
    if (movingErrorList.value[item.id]) {
        delete movingErrorList.value[item.id];
    } else {
        console.log('sorry m8 its fukd');
    }
}

watch(errorBag, async () => {
    let id;
    for (const errorMessage in errorBag.value) {
        if (!errorBag.value[errorMessage]) return;
        do {
            id = Math.floor(Math.random()*100000);
        } while (movingErrorList.value[id]);
        // format msg

        movingErrorList.value[id] = {
            id,
            msg: errorBag.value[errorMessage].join(' | '),
            yVal: Math.floor(Math.random()*20),
            speed: Math.floor(Math.random()*5+5),
        };

    }
})

</script>
