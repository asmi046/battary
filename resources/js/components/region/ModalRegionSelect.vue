<template>
    <dialog class="modal_win" @click="closeWinOver" ref="modalwin" aria-label="Выбор региона">
        <svg @click="closeWin" class="sprite_icon">
                <use xlink:href="#close_icon"></use>
        </svg>
        <div class="win">
            <slot></slot>
        </div>
    </dialog>
</template>

<script setup>
    import { ref, watch } from 'vue';

    let modalwin = ref(null)

    const props = defineProps({
        show: Boolean
    })

    watch(() => props.show, () => {
        !props.show?closeWin():openWin()
    })

    const emit = defineEmits(['update:show'])

    const openWin = () => {
        modalwin.value.showModal()
    }

    const closeWin = () => {
        modalwin.value.close()
        emit('update:show',false)
    }

    const closeWinOver = (event) => {
        if (event.target == modalwin.value)
        closeWin()
    }


</script>

