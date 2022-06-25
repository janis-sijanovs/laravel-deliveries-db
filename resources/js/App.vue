<script lang="ts">
import { defineComponent, ref, onMounted } from "vue";
import Client from "./models/client";
import Addresses from "./components/addresses/Addresses.vue";

export default defineComponent({
  name: "App",
  props: {
    clients: {
      type: Object as () => Client[] | null,
    },
  },
  setup() {
    const csrf = ref<null | string>(null);

    const currentID = ref<null | number>(null);

    const setCurrentID = (id: number) => {
      currentID.value = id;
    };

    onMounted(() => {
      const csrfElement = document.querySelector('meta[name="csrf-token"]');
      csrf.value = csrfElement?.getAttribute("content") || "no value";
    });

    return { currentID, setCurrentID, csrf };
  },
  components: { Addresses },
});
</script>

<template>
  <div class="split-page" v-if="clients">
    <div class="split-page__container split-page__container--no-border">
      <table>
        <tr>
          <th class="table__item table__title">ID</th>
          <th class="table__item table__title">Name</th>
          <th class="table__item table__title">Phone</th>
          <th class="table__item table__title">Email</th>
          <th class="table__item table__title">Addresses</th>
          <th class="table__item table__title">Deliveries</th>
        </tr>
        <tr v-for="client in clients" :key="client.id">
          <td class="table__item table__item--shrink">{{ client.id }}</td>
          <td class="table__item">{{ client.name }}</td>
          <td class="table__item">{{ client.phone }}</td>
          <td class="table__item">
            {{ client.email }}
          </td>
          <td class="table__item">
            <button class="nav-button" @click="setCurrentID(client.id)">
              Addresses..
            </button>
          </td>
          <td class="table__item">
            <form
              class="table__item"
              :action="`/clients/${client.id}/deliveries`"
              method="post"
            >
              <input type="hidden" name="_token" :value="csrf" />
              <button class="nav-button" type="submit">Deliveries >></button>
            </form>
          </td>
        </tr>
      </table>
    </div>
    <div class="split-page__container">
      <div v-if="currentID !== null">
        <Addresses :clientID="currentID" />
      </div>
    </div>
  </div>
</template>
