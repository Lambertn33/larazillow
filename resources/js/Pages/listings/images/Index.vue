<template>
  <Box>
    <template #header>
      <span class="text-xl font-semibold"> Upload new files </span>
    </template>
    <form @submit.prevent="uploadFiles">
      <div v-if="imageErrors.length" class="input-error">
        <div v-for="(error, index) in imageErrors" :key="index">
          {{ error }}
        </div>
      </div>
      <input type="file" multiple @input="addFiles" />
      <button type="submit" :disabled="!isFormValid" class="btn-outline">Upload files</button>
      <button type="reset" class="btn-outline" @click="reset">Reset</button>
    </form>
  </Box>
  <Box>
    <template #header>Current Listing Images</template>
    <div class="mt-4 gap-4 grid grid-cols-1 md:grid-cols-3">
      <div v-for="image of listing.images" :key="image.id" class="flex flex-col justify-between">
        <div class="">
          <img :src="image.image_src" alt="" width="300">
          <Link :href="`/realtor/listing/${listing.id}/images/${image.id}`" as="button" method="DELETE" class="mt-4 btn-outline text-xs">Delete</Link>
        </div>
      </div>
    </div>
  </Box>
</template>

<script setup>
import { useForm, router, Link } from "@inertiajs/vue3";
import Box from "../../../components/UI/Box.vue";
import { computed } from "vue";
import NProgress from 'nprogress'

const form = useForm({
  images: [],
});

const props = defineProps({
  listing: Object,
});

const uploadFiles = () =>
  form.post(`/realtor/listing/${props.listing.id}/images`, {
    onSuccess: () => form.reset("images"),
  });

const addFiles = (event) => {
  for (const image of event.target.files) {
    form.images.push(image);
  }
};

router.on('progress', (event) => {
  if (event.detail.progress.percentage) {
    NProgress.set((event.detail.progress.percentage / 100) * 0.9)
  }
})


const reset = () => form.reset("images");

const isFormValid = computed(() => form.images.length);

const imageErrors = computed(() => Object.values(form.errors))
</script>