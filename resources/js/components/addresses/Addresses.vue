<script lang="ts">
import { defineComponent, ref, watchEffect } from "vue";
import axios from "axios";
import Address from "../../models/address";

export default defineComponent({
  name: "AddressesComponent",
  props: {
    clientID: {
      type: Number,
    },
  },
  setup(props) {
    const loading = ref(false);
    const error = ref("");
    const addresses = ref<Address[]>([] as Address[]);

    const fetchAddresses = async (clientID: number | undefined) => {
      loading.value = true;
      try {
        const response = await axios.get(`/api/addresses/${clientID}`);
        addresses.value = response.data;
        console.log(response);
      } catch (err: unknown) {
        if (axios.isAxiosError(err)) {
          if (err.response?.status === 404) {
            error.value = "No Data";
          } else {
            error.value = err.message;
          }
        } else {
          error.value = "Not Axios Error";
        }
      } finally {
        loading.value = false;
      }
    };

    watchEffect(() => fetchAddresses(props.clientID));

    return { addresses, loading, error };
  },
});
</script>

<template>
  <div class="column-list">
    <p class="column-list__item column-name">Addresses</p>
    <p class="column-list__item column-name" v-if="loading">Loading..</p>
    <p class="column-list__item column-name" v-if="error">{{ error }}</p>

    <div class="column-list" v-for="address in addresses" :key="address.id">
      <p class="column-list__item">{{ address.title }}</p>
    </div>
  </div>
</template>
