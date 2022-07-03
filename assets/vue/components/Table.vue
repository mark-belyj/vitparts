<template>
  <div class="table__root">

    <div class="table__head">
      <div v-for="(z, i) in tableHead"
           :key="`table-row-${i}`"
           class="table__row_cell"
           @click="sortDetails(z)"
      >
        {{ z }}
      </div>
    </div>

    <div v-for="(detail, i) in details"
         :key="`table-row-${i}`"
         class="table__row"
    >
      <div class="table__row_cell"> {{ detail['firm'] }} </div>
      <div class="table__row_cell"> {{ detail['code'] }} </div>
      <div class="table__row_cell"> {{ detail['prices'] }} </div>
      <div class="table__row_cell"> {{ detail['datetime'] }} </div>

    </div>
  </div>
</template>

<script>
import { computed } from 'vue';
import { useStore } from "vuex";
  export default {
    setup() {
      const store = useStore();

      let details = computed(() => {
        return store.state.detail.details
      });

      let tableHead = computed(() => {
        if (store.state.detail.details && store.state.detail.details.length) {
          let keys = Object.keys(store.state.detail.details[0]);
          return keys.filter(x => !['id'].includes(x));
        }
        return [];
      });

      const sortDetails = (field) => {

      }

      return {
        details,
        tableHead,
        sortDetails
      }
    }
  }
</script>

<style scoped>
  .table__row,
  .table__head {
    display: flex;
    align-items: center;
    height: 30px;
    transition: .1s;
  }

  .table__row {
    text-transform: lowercase;
  }

  .table__head {
    height: 40px;
    text-transform: uppercase;
    background: #222;
    color: rgba(255, 255, 255, 0.7);
  }

  .table__head > .table__row_cell {
    cursor: pointer;
    transition: .3s;
  }

  .table__head > .table__row_cell:hover {
    color: white;
  }

  .table__row:hover {
    background: rgba(34, 34, 34, 0.4);
  }

  .table__row_cell {
    width: 25%;
    padding: 10px;
  }
</style>