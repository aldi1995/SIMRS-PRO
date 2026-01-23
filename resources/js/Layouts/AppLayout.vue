<script setup>
import { ref } from 'vue'
import { usePage, Link, router } from '@inertiajs/vue3'
import {
  VApp,
  VNavigationDrawer,
  VAppBar,
  VMain,
  VList,
  VListItem,
  VListItemTitle,
  VIcon,
  VSpacer,
  VBtn,
  VAvatar,
  VDivider,
  VListGroup,
  VDialog,
  VCard,
  VCardTitle,
  VCardText,
  VCardActions
} from 'vuetify/components'

const drawer = ref(true)
const confirmLogout = ref(false)

const page = usePage()
const user = page.props.auth?.user

const logout = () => {
  router.post(route('logout'))
}

const menu = [
  { title: 'Dashboard', icon: 'mdi-view-dashboard', route: '/dashboard' },

  {
    title: 'Pelayanan Medis',
    icon: 'mdi-stethoscope',
    children: [
      { title: 'Pasien', route: '/patients' },
      { title: 'Daftar Kunjungan', route: '/visits/' },
      { title: 'Rekam Medis', route: '/medical-records/' },
      { title: 'IGD', route: '/igd' },
      { title: 'Rawat Jalan', route: '/outpatient' },
      { title: 'Rawat Inap', route: '/inpatient' },
      { title: 'Tindakan Medis', route: '/procedures' }
    ]
  },

  {
    title: 'Penunjang',
    icon: 'mdi-flask',
    children: [
      { title: 'Laboratorium', route: '/laboratory' },
      { title: 'Radiologi', route: '/radiology' },
      { title: 'Farmasi', route: '/pharmacy' }
    ]
  },

  {
    title: 'Keuangan',
    icon: 'mdi-cash-register',
    children: [
      { title: 'Billing', route: '/finance/billing' },
      { title: 'Kasir', route: '/finance/cashier' },
      { title: 'Klaim BPJS', route: '/finance/bpjs' }
    ]
  },

  {
    title: 'Manajemen',
    icon: 'mdi-chart-line',
    children: [
      { title: 'Dashboard Manajemen', route: '/management/dashboard' },
      { title: 'Laporan RS', route: '/management/reports' },
      { title: 'Statistik RS', route: '/management/statistics' }
    ]
  },

  {
    title: 'Sistem',
    icon: 'mdi-cog',
    children: [
      { title: 'User Management', route: '/system/users' },
      { title: 'Role & Permission', route: '/system/roles' },
      { title: 'Audit Log', route: '/system/audit-log' },
      { title: 'Master Data', route: '/system/master-data' }
    ]
  }
]
</script>

<template>
  <v-app>

    <!-- SIDEBAR -->
    <v-navigation-drawer v-model="drawer" width="290" class="sidebar-glass">

      <!-- BRAND -->
      <div class="brand px-5 py-4">
        <strong class="text-h6">
          SIMRS<span class="text-primary">-PRO</span>
        </strong>
        <p class="brand-subtitle">Secure Healthcare System</p>
      </div>

      <v-divider class="mb-2" />

      <!-- MENU -->
      <v-list nav density="comfortable">

        <template v-for="item in menu" :key="item.title">

          <!-- SINGLE -->
          <v-list-item v-if="!item.children">
            <Link :href="item.route" class="sidebar-link d-flex align-center">
              <v-icon :icon="item.icon" class="me-3" />
              <v-list-item-title>{{ item.title }}</v-list-item-title>
            </Link>
          </v-list-item>

          <!-- GROUP -->
          <v-list-group v-else>
            <template #activator="{ props }">
              <v-list-item v-bind="props">
                <template #prepend>
                  <v-icon :icon="item.icon" />
                </template>
                <v-list-item-title>{{ item.title }}</v-list-item-title>
              </v-list-item>
            </template>

            <v-list-item
              v-for="child in item.children"
              :key="child.title"
              class="ms-6"
            >
              <Link :href="child.route" class="sidebar-link">
                {{ child.title }}
              </Link>
            </v-list-item>

          </v-list-group>

        </template>

      </v-list>

    </v-navigation-drawer>

    <!-- TOP BAR -->
    <v-app-bar flat height="72" class="topbar-glass">

      <v-btn icon @click="drawer = !drawer">
        <v-icon>mdi-menu</v-icon>
      </v-btn>

      <v-spacer />

      <div class="d-flex align-center gap-2">
        <span class="user-name">{{ user?.name }}</span>

        <v-avatar size="36" color="primary">
          {{ user?.name?.charAt(0) }}
        </v-avatar>

        <v-btn icon variant="text" @click="confirmLogout = true">
          <v-icon>mdi-logout</v-icon>
        </v-btn>
      </div>

    </v-app-bar>

    <!-- MAIN -->
    <v-main class="main-bg">
      <v-container fluid class="pa-6">
        <slot />
      </v-container>
    </v-main>

    <!-- LOGOUT CONFIRM MODAL -->
    <v-dialog v-model="confirmLogout" max-width="420">
      <v-card class="glass-card">
        <v-card-title class="text-h6">
          Konfirmasi Logout
        </v-card-title>

        <v-card-text class="text-muted">
          Apakah Anda yakin ingin keluar dari SIMRS PRO?
        </v-card-text>

        <v-card-actions class="justify-end">
          <v-btn variant="text" @click="confirmLogout = false">
            Batal
          </v-btn>

          <v-btn color="red" @click="logout">
            Logout
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>

  </v-app>
</template>

<style scoped>
/* Sidebar */
.sidebar-glass {
  background: rgba(15, 23, 42, 0.92);
  backdrop-filter: blur(12px);
  border-right: 1px solid rgba(255, 255, 255, 0.08);
  color: #e5e7eb;
}

.brand-subtitle {
  font-size: 0.75rem;
  color: #94a3b8;
}

/* Topbar */
.topbar-glass {
  background: rgba(15, 23, 42, 0.85);
  backdrop-filter: blur(12px);
  border-bottom: 1px solid rgba(255, 255, 255, 0.08);
  color: white;
}

.user-name {
  font-size: 0.9rem;
  color: #cbd5f5;
}

/* Main */
.main-bg {
  background: linear-gradient(135deg, #020617, #0f172a);
  min-height: 100vh;
  color: white;
}

/* Sidebar Link */
.sidebar-link {
  width: 100%;
  display: flex;
  align-items: center;
  gap: 10px;
  text-decoration: none;
  color: inherit;
  font-weight: 500;
}

.sidebar-link:hover {
  color: #60a5fa;
}

/* Modal Glass */
.glass-card {
  background: rgba(15, 23, 42, 0.95);
  backdrop-filter: blur(12px);
  color: white;
}

.text-muted {
  color: #94a3b8;
}

.page-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.page-header h1 {
  font-size: 26px;
  font-weight: 900;
}

.glass-card {
  background: rgba(255,255,255,0.06);
  border-radius: 18px;
  border: 1px solid rgba(255,255,255,0.08);
}

.text-muted {
  color: #94a3b8;
}

</style>
