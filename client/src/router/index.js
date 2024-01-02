import { createRouter, createWebHistory } from 'vue-router';
import Summary from '../pages/Summary.vue';
import Home from '../components/Home.vue';
import Login from '../views/Login.vue';
import Register from '../views/Register.vue';
import Cycletime from '../pages/cycletime/Cycletime.vue';
import CycletimePercentile from '../pages/cycletime_percentile/CycletimePercentile.vue';
import DailyHitRate from '../pages/daily_hit_rate/DailyHitRate.vue';
import DailyHitRateCreate from '../pages/daily_hit_rate/DailyHitRateCreate.vue';
import ExcessHours from '../pages/excess_hours/ExcessHours.vue';
import PlanningRequest from '../pages/planning_request/PlanningRequest.vue';
import RepairOutput from '../pages/repair_output/RepairOutput.vue';
import CycletimeCreate from '../pages/cycletime/CycletimeCreate.vue';
import PlanningCreate from '../pages/planning_request/PlanningCreate.vue';
import OvertimeCreate from '../pages/excess_hours/OvertimeCreate.vue';
import HeadcountCreate from '../pages/headcount/HeadcountCreate.vue';
import ProtectedLayout from '../components/ProtectedLayout.vue';
import GuestLayout from '../components/GuestLayout.vue';

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
        path: '/protected',
        component: ProtectedLayout,
        children: [
            {
                path: '/home',
                name: 'home',
                component: Home
            },
            {
                path: '/cycletime-create',
                name: 'cycletime-create',
                component: CycletimeCreate
            },
            {
                path: '/headcount-create',
                name: 'headcount-create',
                component: HeadcountCreate
            },
            {
                path: '/planning-create',
                name: 'planning-create',
                component: PlanningCreate
            },
            {
                path: '/overtime-create',
                name: 'overtime-create',
                component: OvertimeCreate
            },
            {
                path: '/daily-hit',
                name: 'daily-hit',
                component: DailyHitRateCreate
            },
            {
                path: '/about',
                name: 'about',
                // route level code-splitting
                // this generates a separate chunk (About.[hash].js) for this route
                // which is lazy-loaded when the route is visited.
                component: () => import('../views/AboutView.vue')
            }
        ]

    },
    {
        path: '/guest',
        component: GuestLayout,
        children: [
            {
                path: '/',
                component: Summary
            },
            {
              path: '/login',
              name: 'login',
              component: Login
            },
            {
              path: '/register',
              name: 'register',
              component: Register
            },
            {
                path: '/cycletime',
                name: 'cycletime',
                component: Cycletime
            },
            {
                path: '/cycletime-percentile',
                name: 'cycletime-percentile',
                component: CycletimePercentile
            },
            {
                path: '/daily-hit-rate',
                name: 'daily-hit-rate',
                component: DailyHitRate
            },
            {
                path: '/excess-hours',
                name: 'excess-hours',
                component: ExcessHours
            },
            {
                path: '/planning-request',
                name: 'planning-request',
                component: PlanningRequest
            },
            {
                path: '/repair-output',
                name: 'repair-output',
                component: RepairOutput
            },
        ]
    },
  ]
})

export default router
