<template>
  <Head>
    <title>Log In</title>
    <meta
      type="description"
      head-key="description"
      content="Create a new user"
    />
  </Head>
  <main class="grid place-items-center min-h-screen">
    <section class="bg-white p-8 rounded-xl w-80 mx-auto border">
      <h1 class="text-3xl md-6">Log In</h1>
      <form @submit.prevent="submit" class="max-w-md mx-auto mt-8">
        <div class="mb-6">
          <label
            class="block mb-2 uppercase font-bold text-xs text-gray-700"
            for="email"
          >
            Email
          </label>

          <input
            v-model="form.email"
            class="rounded border border-gray-400 p-2 w-full"
            type="email"
            name="email"
            id="email"
          />
          <div
            v-if="form.errors.email"
            class="text-sm text-red-600"
            v-text="form.errors.email"
          ></div>
        </div>
        <div class="mb-6">
          <label
            class="block mb-2 uppercase font-bold text-xs text-gray-700"
            for="password"
          >
            Password
          </label>

          <input
            v-model="form.password"
            class="rounded border border-gray-400 p-2 w-full"
            type="password"
            name="password"
            id="password"
          />
          <div
            v-if="form.errors.password"
            class="text-sm text-red-600"
            v-text="form.errors.password"
          ></div>
        </div>
        <div class="mb-6">
          <button
            type="submit"
            class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500"
            :disabled="form.processing"
          >
            Log In
          </button>
        </div>
      </form>
    </section>
  </main>
</template>

<script>
export default {
  layout: null,
};
</script>
<script setup>
import { useForm } from "@inertiajs/inertia-vue3";

let form = useForm({
  email: "",
  password: "",
});

let submit = () => {
  form.post("login");
};
</script>
