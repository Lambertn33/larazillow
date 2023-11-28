<template>
  <div>
    <h2>Listing # {{ listing.id }}</h2>
    <div>
      {{ listing.street }} {{ listing.street_no }} {{ listing.city }} for ${{
        listing.price
      }}
    </div>
  </div>
</template>

<script setup>
defineProps({
  listing: Object,
});
</script>