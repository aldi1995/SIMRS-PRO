<script setup>
import { Head } from '@inertiajs/vue3'
import {
  VApp,
  VAppBar,
  VMain,
  VContainer,
  VRow,
  VCol,
  VBtn,
  VSpacer,
  VIcon
} from 'vuetify/components'

defineProps({
  canLogin: Boolean,
})
</script>

<template>
  <Head title="SIMRS PRO" />

  <v-app>
    <!-- App Bar -->
    <v-app-bar flat height="72" class="px-8" color="transparent">
      <strong class="text-h6 font-weight-bold">SIMRS<span class="text-primary">PRO</span></strong>
      <v-spacer />
      <v-btn
        v-if="canLogin"
        href="/login"
        color="primary"
        size="large"
        rounded="lg"
      >
        Login
      </v-btn>
    </v-app-bar>

    <!-- Main -->
    <v-main class="welcome-bg">
      <v-container class="fill-height">
        <v-row align="center">
          <!-- LEFT CONTENT -->
          <v-col cols="12" md="6">
            <h1 class="hero-title">
              Sistem Informasi<br />
              Manajemen Rumah Sakit
            </h1>

            <p class="hero-subtitle">
              Platform digital terintegrasi untuk pelayanan medis,
              operasional klinis, dan manajemen rumah sakit modern.
            </p>

            <div class="feature-list">
              <div><v-icon icon="mdi-check-circle" /> Rekam Medis Elektronik</div>
              <div><v-icon icon="mdi-check-circle" /> Rawat Jalan & Inap</div>
              <div><v-icon icon="mdi-check-circle" /> Farmasi & Billing</div>
              <div><v-icon icon="mdi-check-circle" /> Audit & Role-Based Access</div>
            </div>

            <v-btn
              href="/login"
              color="primary"
              size="x-large"
              class="mt-8 px-12"
              rounded="xl"
            >
              Masuk ke Sistem
            </v-btn>
          </v-col>

          <!-- RIGHT GLASS CARD -->
          <v-col cols="12" md="6" class="d-none d-md-flex justify-center">
            <div class="glass-card">
              <h3>Secure Healthcare Platform</h3>
              <p>
                Dirancang untuk dokter, perawat, farmasi,
                kasir, dan manajemen rumah sakit.
              </p>

              <ul>
                <li>✔ Compliance-ready</li>
                <li>✔ Audit & Logging</li>
                <li>✔ Scalable Architecture</li>
                <li>✔ Modern UI Experience</li>
              </ul>
            </div>
          </v-col>
        </v-row>
      </v-container>

      <footer class="footer-text">
        © 2026 SIMRS PRO · Secure Healthcare System
      </footer>
    </v-main>
  </v-app>
</template>

<style scoped>
.welcome-bg {
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

.hero-title {
  font-size: 3rem;
  font-weight: 800;
  line-height: 1.15;
}

.hero-subtitle {
  font-size: 1.1rem;
  max-width: 520px;
  margin-top: 1rem;
  color: #cbd5f5;
}

.feature-list {
  margin-top: 2rem;
  display: grid;
  gap: 0.75rem;
  font-size: 0.95rem;
}

.feature-list .v-icon {
  color: #60a5fa;
  margin-right: 6px;
}

.glass-card {
  background: rgba(255, 255, 255, 0.08);
  backdrop-filter: blur(14px);
  -webkit-backdrop-filter: blur(14px);
  border-radius: 20px;
  padding: 32px;
  max-width: 380px;
  border: 1px solid rgba(255, 255, 255, 0.15);
}

.glass-card h3 {
  font-size: 1.25rem;
  font-weight: 700;
  margin-bottom: 8px;
}

.glass-card p {
  font-size: 0.9rem;
  color: #dbeafe;
  margin-bottom: 12px;
}

.glass-card ul {
  font-size: 0.85rem;
  padding-left: 18px;
  color: #e0e7ff;
}

.footer-text {
  position: absolute;
  bottom: 16px;
  width: 100%;
  text-align: center;
  font-size: 0.75rem;
  color: #94a3b8;
}
</style>
