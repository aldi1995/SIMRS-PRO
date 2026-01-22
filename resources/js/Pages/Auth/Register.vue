<script setup>
import { ref } from 'vue'
import { Head, Link, useForm } from '@inertiajs/vue3'
import {
  VApp,
  VMain,
  VContainer,
  VCard,
  VTextField,
  VBtn
} from 'vuetify/components'

const form = useForm({
  name: '',
  email: '',
  password: '',
  password_confirmation: '',
})

const showPassword = ref(false)
const showPasswordConfirmation = ref(false)

const submit = () => {
  form.post(route('register'), {
    onFinish: () => form.reset('password', 'password_confirmation'),
  })
}
</script>

<template>
  <Head title="Register | SIMRS PRO" />

  <v-app>
    <v-main class="register-bg">
      <v-container class="fill-height d-flex justify-center align-center">
        <v-card class="glass-register">

          <h2 class="register-title">
            SIMRS<span class="text-primary">PRO</span>
          </h2>

          <p class="register-subtitle">
            Buat akun baru untuk mengakses sistem rumah sakit
          </p>

          <form @submit.prevent="submit" class="mt-6">
            <v-text-field
              v-model="form.name"
              label="Full Name"
              variant="outlined"
              density="comfortable"
              :error-messages="form.errors.name"
              autocomplete="name"
              required
            />

            <v-text-field
              v-model="form.email"
              label="Email"
              type="email"
              variant="outlined"
              density="comfortable"
              :error-messages="form.errors.email"
              autocomplete="username"
              required
            />

            <v-text-field
              v-model="form.password"
              :type="showPassword ? 'text' : 'password'"
              label="Password"
              variant="outlined"
              density="comfortable"
              :append-inner-icon="showPassword ? 'mdi-eye-off' : 'mdi-eye'"
              @click:append-inner="showPassword = !showPassword"
              :error-messages="form.errors.password"
              autocomplete="new-password"
              required
            />

            <v-text-field
              v-model="form.password_confirmation"
              :type="showPasswordConfirmation ? 'text' : 'password'"
              label="Confirm Password"
              variant="outlined"
              density="comfortable"
              :append-inner-icon="showPasswordConfirmation ? 'mdi-eye-off' : 'mdi-eye'"
              @click:append-inner="showPasswordConfirmation = !showPasswordConfirmation"
              :error-messages="form.errors.password_confirmation"
              autocomplete="new-password"
              required
            />

            <v-btn
              :loading="form.processing"
              :disabled="form.processing"
              type="submit"
              color="primary"
              size="large"
              class="w-100 mt-6"
              rounded="xl"
            >
              Create Account
            </v-btn>

            <p class="login-link mt-4">
              Sudah punya akun?
              <Link :href="route('login')">Login di sini</Link>
            </p>
          </form>

          <p class="footer-text">
            Secure Healthcare System · SIMRS PRO
          </p>

        </v-card>
      </v-container>
    </v-main>
  </v-app>
</template>

<style scoped>
.register-bg {
  min-height: 100vh;
  background: radial-gradient(
      at top left,
      rgba(33, 150, 243, 0.25),
      transparent 60%
    ),
    linear-gradient(
      135deg,
      #0f172a,
      #020617
    );
  color: #e5e7eb;
}

.glass-register {
  width: 100%;
  max-width: 460px;
  padding: 36px;
  border-radius: 22px;
  background: rgba(255, 255, 255, 0.08);
  backdrop-filter: blur(14px);
  -webkit-backdrop-filter: blur(14px);
  border: 1px solid rgba(255, 255, 255, 0.15);
}

.register-title {
  font-size: 1.6rem;
  font-weight: 800;
  text-align: center;
}

.register-subtitle {
  text-align: center;
  font-size: 0.95rem;
  color: #cbd5f5;
  margin-top: 6px;
}

.login-link {
  text-align: center;
  font-size: 0.85rem;
  color: #94a3b8;
}

.login-link a {
  color: #93c5fd;
  text-decoration: none;
  margin-left: 4px;
}

.login-link a:hover {
  text-decoration: underline;
}

.footer-text {
  margin-top: 18px;
  font-size: 0.75rem;
  text-align: center;
  color: #94a3b8;
}
</style>
