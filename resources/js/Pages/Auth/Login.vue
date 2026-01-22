<script setup>
import { ref } from 'vue'
import { Head, Link, useForm } from '@inertiajs/vue3'
import {
  VApp,
  VMain,
  VContainer,
  VCard,
  VTextField,
  VCheckbox,
  VBtn,
  VIcon
} from 'vuetify/components'

defineProps({
  canResetPassword: Boolean,
  status: String,
})

const form = useForm({
  email: '',
  password: '',
  remember: false,
})

const showPassword = ref(false)

const submit = () => {
  form.post(route('login'), {
    onFinish: () => form.reset('password'),
  })
}
</script>

<template>
  <Head title="Login | SIMRS PRO" />

  <v-app>
    <v-main class="login-bg">
      <v-container class="fill-height d-flex justify-center align-center">
        <v-card class="glass-login">
          <h2 class="login-title">
            SIMRS<span class="text-primary">PRO</span>
          </h2>

          <p class="login-subtitle">
            Masuk ke sistem manajemen rumah sakit
          </p>

          <form @submit.prevent="submit" class="mt-6">
            <v-text-field
              v-model="form.email"
              label="Email"
              type="email"
              variant="outlined"
              density="comfortable"
              :error-messages="form.errors.email"
              autocomplete="email"
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
              autocomplete="current-password"
              required
            />

            <div class="d-flex justify-space-between align-center mt-2">
              <v-checkbox
                v-model="form.remember"
                label="Remember me"
                density="compact"
              />

              <Link
                v-if="canResetPassword"
                :href="route('password.request')"
                class="forgot-link"
              >
                Forgot password?
              </Link>
            </div>

            <v-btn
              :loading="form.processing"
              :disabled="form.processing"
              type="submit"
              color="primary"
              size="large"
              class="w-100 mt-6"
              rounded="xl"
            >
              Login
            </v-btn>
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
.login-bg {
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

.glass-login {
  width: 100%;
  max-width: 420px;
  padding: 36px;
  border-radius: 22px;
  background: rgba(255, 255, 255, 0.08);
  backdrop-filter: blur(14px);
  -webkit-backdrop-filter: blur(14px);
  border: 1px solid rgba(255, 255, 255, 0.15);
}

.login-title {
  font-size: 1.6rem;
  font-weight: 800;
  text-align: center;
}

.login-subtitle {
  text-align: center;
  font-size: 0.95rem;
  color: #cbd5f5;
  margin-top: 6px;
}

.forgot-link {
  font-size: 0.85rem;
  color: #93c5fd;
  text-decoration: none;
}

.forgot-link:hover {
  text-decoration: underline;
}

.footer-text {
  margin-top: 18px;
  font-size: 0.75rem;
  text-align: center;
  color: #94a3b8;
}
</style>
