<template>
  <form @submit.prevent="submitForm">
    <div class="grid grid-cols-6 gap-4">
      <div class="col-span-2">
        <label class="block mb-1 text-gray-500 dark:text-gray-300 font-medium"
          >Beds</label
        >
        <input
          v-model.number="form.beds"
          type="text"
          class="block w-full p-2 rounded-md shadow-sm border border-gray-300 dark:border-gray-600 text-gray-500"
        />
        <div v-if="form.errors.beds" class="input-error">
          {{ form.errors.beds }}
        </div>
      </div>

      <div class="col-span-2">
        <label class="block mb-1 text-gray-500 dark:text-gray-300 font-medium"
          >Baths</label
        >
        <input
          v-model.number="form.baths"
          type="text"
          class="block w-full p-2 rounded-md shadow-sm border border-gray-300 dark:border-gray-600 text-gray-500"
        />
        <div v-if="form.errors.baths" class="input-error">
          {{ form.errors.baths }}
        </div>
      </div>

      <div class="col-span-2">
        <label class="block mb-1 text-gray-500 dark:text-gray-300 font-medium"
          >Area</label
        >
        <input
          v-model.number="form.area"
          type="text"
          class="block w-full p-2 rounded-md shadow-sm border border-gray-300 dark:border-gray-600 text-gray-500"
        />
        <div v-if="form.errors.area" class="input-error">
          {{ form.errors.area }}
        </div>
      </div>

      <div class="col-span-4">
        <label class="block mb-1 text-gray-500 dark:text-gray-300 font-medium"
          >City</label
        >
        <input
          v-model="form.city"
          type="text"
          class="block w-full p-2 rounded-md shadow-sm border border-gray-300 dark:border-gray-600 text-gray-500"
        />
        <div v-if="form.errors.city" class="input-error">
          {{ form.errors.city }}
        </div>
      </div>

      <div class="col-span-2">
        <label class="block mb-1 text-gray-500 dark:text-gray-300 font-medium"
          >Post Code</label
        >
        <input
          v-model="form.code"
          type="text"
          class="block w-full p-2 rounded-md shadow-sm border border-gray-300 dark:border-gray-600 text-gray-500"
        />
        <div v-if="form.errors.code" class="input-error">
          {{ form.errors.code }}
        </div>
      </div>

      <div class="col-span-4">
        <label class="block mb-1 text-gray-500 dark:text-gray-300 font-medium"
          >Street</label
        >
        <input
          v-model="form.street"
          type="text"
          class="block w-full p-2 rounded-md shadow-sm border border-gray-300 dark:border-gray-600 text-gray-500"
        />
        <div v-if="form.errors.street" class="input-error">
          {{ form.errors.street }}
        </div>
      </div>

      <div class="col-span-2">
        <label class="block mb-1 text-gray-500 dark:text-gray-300 font-medium"
          >Street Number</label
        >
        <input
          v-model.number="form.street_no"
          type="text"
          class="block w-full p-2 rounded-md shadow-sm border border-gray-300 dark:border-gray-600 text-gray-500"
        />
        <div v-if="form.errors.street_no" class="input-error">
          {{ form.errors.street_no }}
        </div>
      </div>

      <div class="col-span-6">
        <label class="block mb-1 text-gray-500 dark:text-gray-300 font-medium"
          >Price</label
        >
        <input
          v-model.number="form.price"
          type="text"
          class="block w-full p-2 rounded-md shadow-sm border border-gray-300 dark:border-gray-600 text-gray-500"
        />
        <div v-if="form.errors.price" class="input-error">
          {{ form.errors.price }}
        </div>
      </div>

      <div class="col-span-6">
        <button
          type="submit"
          class="bg-green-600 hover:bg-green-500 text-white font-medium p-2 rounded-md"
        >
          Update
        </button>
      </div>
    </div>
  </form>
</template>
  
    <script setup>
import { useForm } from "@inertiajs/vue3";

const props = defineProps({
  errors: Object,
  listing: Object,
});

const form = useForm({
  beds: props.listing.beds,
  baths: props.listing.baths,
  city: props.listing.city,
  area: props.listing.area,
  street: props.listing.street,
  street_no: props.listing.street_no,
  code: props.listing.code,
  price: props.listing.price,
});

const submitForm = () => form.put(`/listings/${props.listing.id}`);
</script>
    
    <style scoped>
label {
  margin-right: 2em;
}

div {
  padding: 2px;
}
</style>