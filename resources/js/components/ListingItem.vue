<template>
  <div>
    <Link :href="`/listings/${listing.id}`">
      <ListingPrice :price="listing.price" class="text-2xl font-bold"/>
      <ListingSpace :listing="listing" class="text-lg" />
    </Link>
    <div>
      <Link :href="`/listings/${listing.id}/edit`">Edit</Link>
      <Link :href="`/listings/${listing.id}`" method="DELETE">Delete</Link>
    </div>
  </div>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
import ListingSpace from "./ListingSpace.vue";
import ListingPrice from "./ListingPrice.vue";
defineProps({
  listing: Object,
});
</script>