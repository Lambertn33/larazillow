<template>
  <div>
    <Link :href="`/listings/${listing.id}`">
      <div class="flex items-center gap-2">
        <ListingPrice :price="listing.price" class="text-2xl font-bold" />
        <div><ListingPrice :price="monthlyPayment" class="text-xs" /> pm</div>
      </div>
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
import { useMonthlyPayment } from "../composables/useMonthlyPayment";

const props = defineProps({
  listing: Object,
});

const { monthlyPayment } = useMonthlyPayment(props.listing.price, 2.5, 25);
</script>