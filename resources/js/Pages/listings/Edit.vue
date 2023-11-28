<template>
    <form @submit.prevent="submitForm">
      <div>
        <div>
          <label>Beds</label>
          <input type="text" v-model.number="form.beds" />
          <div v-if="errors.beds">{{ errors.beds }}</div>
        </div>
  
        <div>
          <label>Baths</label>
          <input type="text" v-model.number="form.baths" />
          <div v-if="errors.baths">{{ errors.baths }}</div>
        </div>
  
        <div>
          <label>Area</label>
          <input type="text" v-model.number="form.area" />
          <div v-if="errors.area">{{ errors.area }}</div>
        </div>
  
        <div>
          <label>City</label>
          <input type="text" v-model="form.city" />
          <div v-if="errors.city">{{ errors.city }}</div>
        </div>
  
        <div>
          <label>Post Code</label>
          <input type="text" v-model="form.code" />
          <div v-if="errors.code">{{ errors.code }}</div>
        </div>
  
        <div>
          <label>Street</label>
          <input type="text" v-model="form.street" />
          <div v-if="errors.street">{{ errors.street }}</div>
        </div>
  
        <div>
          <label>Street Nr</label>
          <input type="text" v-model="form.street_no" />
          <div v-if="errors.street_no">{{ errors.street_no }}</div>
        </div>
  
        <div>
          <label>Price</label>
          <input type="text" v-model.number="form.price" />
          <div v-if="errors.price">{{ errors.price }}</div>
        </div>
  
        <div>
          <button type="submit">Edit</button>
        </div>
      </div>
    </form>
  </template>
  
    <script setup>
  import { useForm } from "@inertiajs/vue3";
  
  const props = defineProps({
    errors: Object,
    listing: Object
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