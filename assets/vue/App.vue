<template>
  <div class="root">
    <Head />
    <div class="root__content">
      <h1 class="root__title">Отслеживаемые запчасти</h1>
      <Table />
      <Popup v-if="isActiveAddDetail" />
    </div>

  </div>
</template>

<script>
import Head from "./components/Head";
import Table from "./components/Table";
import { useStore } from "vuex";
import Popup from "./components/Popup";
import {computed } from 'vue';
export default {
  components: {Popup, Table, Head },
   setup() {
    const store = useStore();
    store.dispatch('getDetails');

    let isActiveAddDetail = computed(() => {
      return store.state.popup.isActiveAddDetail;
    });

    return {
      isActiveAddDetail
    }
  },
}

</script>
<style>
  .root {
    margin: 0 auto;
    background: white;
    max-width: 1280px;
  }

  .root__title {
    margin-bottom: 20px;
  }

  .root__content {
    padding: 20px;
  }

</style>