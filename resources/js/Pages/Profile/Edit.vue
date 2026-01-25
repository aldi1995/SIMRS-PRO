<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import DeleteUserForm from './Partials/DeleteUserForm.vue'
import UpdatePasswordForm from './Partials/UpdatePasswordForm.vue'
import UpdateProfileInformationForm from './Partials/UpdateProfileInformationForm.vue'
import { Head } from '@inertiajs/vue3'

defineProps({
  mustVerifyEmail: Boolean,
  status: String,
})
</script>

<template>
  <Head title="Edit Profile" />

  <AppLayout>

    <div class="page-header mb-6">
      <h1 class="page-title">Pengaturan Profil</h1>
      <p class="page-subtitle">
        Kelola data akun, keamanan, dan pengaturan pengguna
      </p>
    </div>

    <v-row dense>

      <!-- PROFILE INFO -->
      <v-col cols="12" lg="6">
        <v-card class="glass-card pa-6">
          <h3 class="section-title mb-4">
            Informasi Profil
          </h3>

          <UpdateProfileInformationForm
            :must-verify-email="mustVerifyEmail"
            :status="status"
          />
        </v-card>
      </v-col>

      <!-- CHANGE PASSWORD -->
      <v-col cols="12" lg="6">
        <v-card class="glass-card pa-6">
          <h3 class="section-title mb-4">
            Keamanan Akun
          </h3>

          <UpdatePasswordForm />
        </v-card>
      </v-col>

      <!-- DELETE ACCOUNT -->
      <v-col cols="12">
        <v-card class="glass-card danger-card pa-6">
          <h3 class="section-title text-red mb-4">
            Hapus Akun
          </h3>

          <DeleteUserForm />
        </v-card>
      </v-col>

    </v-row>

  </AppLayout>
</template>

<style scoped>
.page-header {
  display: flex;
  flex-direction: column;
  gap: 4px;
}

.page-title {
  font-size: 1.6rem;
  font-weight: 700;
  color: white;
}

.page-subtitle {
  font-size: 0.9rem;
  color: #94a3b8;
}

/* Glass card consistent with SIMRS */
.glass-card {
  background: rgba(15, 23, 42, 0.95);
  border: 1px solid rgba(255,255,255,0.08);
  border-radius: 16px;
  color: white;
}

/* Section Title */
.section-title {
  font-size: 1.05rem;
  font-weight: 600;
  color: #e5e7eb;
}

/* Danger Card */
.danger-card {
  border: 1px solid rgba(239, 68, 68, 0.4);
  background: rgba(127, 29, 29, 0.25);
}
</style>
