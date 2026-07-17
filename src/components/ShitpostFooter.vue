<template>
    <div>
        <div>
            erreurs: {{ errorBag }}
        </div>
        <div>
            error message objects: {{ listRenderTest }}
        </div>
    </div>
    <div>
        <button @click="puush">push object into marquee list</button>
        <li v-for="item in listRenderTest">
            {{ item }}
        </li>
    </div>
    <div fixed bottom-0 w-full flex>
        <div>ey kom skype</div>
        <SelfDestructingMarquee v-for="item in listRenderTest" :item="item" @done="kaboom(item)" :key="item.id"/>
    </div>
</template>

<script setup lang="ts">
import { onMounted, ref, useTemplateRef, watch, type Ref } from 'vue';
import { errorBag } from '../http';
import SelfDestructingMarquee from './SelfDestructingMarquee.vue';

const listRenderTest = ref({});

const puush = () => {
    let id
    do {
        id = Math.floor(Math.random()*100000);
    } while (listRenderTest.value[id]);
    listRenderTest.value[id] = {
        id,
        msg: 'yep pp',
        yVal: Math.floor(Math.random()*20),
    };
}

const kaboom = (item) => {
    console.log('wat gaat er fout?:', listRenderTest.value, listRenderTest.value[item.id])
    if (listRenderTest.value[item.id]) {
        delete listRenderTest.value[item.id];
    } else {
        console.log('sorry m8 its fukd');
    }
}

watch(errorBag.value, async () => {
    console.log('vanuit watcher: ', errorBag.value)
    // TODO: Maybe handle error messages here?
})

</script>
