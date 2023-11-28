<template>
  <div>
    <Link :href="`/listings/${listing.id}`">
      <p>{{ listing.city }} - {{ listing.beds }}</p>
    </Link>
    <div>
      <Link :href="`/listings/${listing.id}/edit`">Edit</Link>
      <Link :href="`/listings/${listing.id}`" method="DELETE">Delete</Link>
    </div>
  </div>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
defineProps({
  listing: Object,
});
</script>