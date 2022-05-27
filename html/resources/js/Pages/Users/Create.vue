<template>
  <Head>
    <title>Create User</title>
    <meta
      type="description"
      head-key="description"
      content="Create a new user"
    />
  </Head>
  <h1 class="text-3xl">Create User</h1>
  <form @submit.prevent="submit" class="max-w-md mx-auto mt-8">
    <div class="mb-6">
        <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
        for="name">
        Name
        </label>

        <input v-model="form.name" class="border border-gray-400 p-2 w-full"
            type="text"
            name="name"
            id="name"
        >
        <div v-if="form.errors.name" class="text-sm text-red-600" v-text="form.errors.name"></div>
    </div>
    <div class="mb-6">
        <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
        for="email">
        Email
        </label>

        <input v-model="form.email" class="border border-gray-400 p-2 w-full"
            type="email"
            name="email"
            id="email"
        >
        <div v-if="form.errors.email" class="text-sm text-red-600" v-text="form.errors.email"></div>
    </div>
    <div class="mb-6">
        <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
        for="password">
        Password
        </label>

        <input v-model="form.password" class="border border-gray-400 p-2 w-full"
            type="password"
            name="password"
            id="password"
        >
        <div v-if="form.errors.password" class="text-sm text-red-600" v-text="form.errors.password"></div>
    </div>
    <div class="mb-6">
        <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500" :disabled="form.processing"  >
            Submit
        </button>
    </div>

  </form>
</template>
<script setup>
import { useForm } from "@inertiajs/inertia-vue3"

let form = useForm({
    name: '',
    email: '',
    password: ''
});

let submit = () => {
    form.post('/users');
}
</script>
