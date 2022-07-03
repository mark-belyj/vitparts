<template>
  <div class="head__root">
    <div class="head__item" @click="showClosePopup">Добавить запчасть</div>
  </div>
</template>

<script>
  import {useStore} from "vuex";
  export default {
    setup() {
      const store = useStore();
      const showClosePopup = () => {
        store.dispatch('showClosePopup', 'isActiveAddDetail');
      }

      return {
        showClosePopup
      }

    }
  }
</script>

<style scoped>
  .head__root {
    background: #222;
    width: 100%;
    height: 50px;
    display: flex;
    align-content: center;
    padding: 0 10px;
    position: sticky;
    top: 0;
  }

  .head__item {
    display: flex;
    align-items: center;
    color: white;
    opacity: .7;
    transition: .3s;
    height: 100%;
    cursor: pointer;
    padding: 0 10px;
  }

  .head__item:hover {
    opacity: 1;
  }
</style>