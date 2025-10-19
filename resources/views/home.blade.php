<div class="bg-white text-gray-800 font-sans flex flex-col min-h-screen">


    <header class="flex justify-between items-center px-6 md:px-12 py-6 border-b-2 border-[#114D58] bg-white shadow-sm">
        <div class="flex items-center gap-3 cursor-pointer">
            <h1
                class="text-2xl md:text-3xl font-bold text-[#114D58] hover:-translate-y-1 transition-transform duration-300 ease-out">
                SASHA
            </h1>
        </div>

        <nav class="space-x-6 text-base font-semibold text-gray-600">
            <a href="#que-es" class="hover:text-[#114D58] transition">Qué es SASHA</a>
            <a href="#origen" class="hover:text-[#114D58] transition">Origen</a>
            <a href="#seguridad" class="hover:text-[#114D58] transition">Seguridad</a>
            <a href="#mision" class="hover:text-[#114D58] transition">Misión y Visión</a>
            <a href="{{route('filament.admin.auth.login')}}" class="hover:text-[#114D58] transition">Ingreso
                administradores</a>
        </nav>
    </header>

    <!-- LOGO PRINCIPAL -->
    <section class="flex justify-center items-center py-10 bg-white border-b border-gray-200">
        <div class="flex flex-col items-center">
            <img src="{{asset('imgs/SASHA.png')}}" alt="Logo SASHA RGB"
                class="w-48 md:w-64 hover:scale-105 transition-transform duration-500 logo-rgb">
        </div>
    </section>

    <!-- BIENVENIDA -->
    <section class="text-center py-16 bg-gradient-to-b from-white to-gray-100">
        <h2 class="text-4xl md:text-5xl font-extrabold text-[#114D58] mb-4 tracking-tight">Bienvenido a SASHA</h2>
        <p class="max-w-3xl mx-auto text-lg text-gray-700">
            <strong>(SASHA)</strong> integra las tecnologías de
            <span class="text-[#114D58] font-semibold">S.A.R.A.</span>
            y <span class="text-[#F25041] font-semibold">System Shadow</span> para gestionar información, usuarios e
            identidades mediante un
            <strong>Identificador Único Universal (U.U.I.D.)</strong>, evitando el uso de múltiples cuentas para los
            mismos datos.
        </p>
    </section>

    <!-- Que es SASHA -->
    <section id="que-es" class="max-w-6xl mx-auto px-6 py-16">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <div>
                <h3 class="text-3xl font-semibold text-[#114D58] mb-4">¿Qué es SASHA?</h3>
                <p class="text-gray-700 mb-4 leading-relaxed">
                    SASHA es una plataforma de integración avanzada que unifica la gestión de identidades, accesos y
                    datos operativos
                    provenientes de distintos sistemas. Su propósito es crear una base sólida, segura y sincronizada
                    entre proyectos
                    institucionales, facilitando la interoperabilidad y la trazabilidad digital.
                </p>
                <ul class="list-disc ml-6 text-gray-700 space-y-2">
                    <li>Gestión centralizada de usuarios e identidades con autenticación única (U.U.I.D.).</li>
                    <li>Control en tiempo real de información compartida entre sistemas.</li>
                    <li>Sincronización automática entre aplicaciones relacionadas.</li>
                    <li>Optimización de recursos y eliminación de redundancia de datos.</li>
                </ul>
            </div>
            <img src="{{asset('imgs/estructura.png')}}" alt="Estructura SASHA"
                class="rounded-xl shadow-md hover:scale-105 transition-transform duration-500">
        </div>
    </section>

    <!-- ORIGEN -->
    <section id="origen" class="py-16 px-6 bg-gray-50 border-t border-b border-gray-200">
        <div class="max-w-6xl mx-auto text-center">
            <h3 class="text-3xl font-semibold text-[#114D58] mb-6">Origen de SASHA</h3>
            <p class="max-w-3xl mx-auto text-gray-700 mb-10 leading-relaxed">
                SASHA surge de la integración de dos proyectos complementarios:
                <strong>S.A.R.A.</strong>, centrado en la automatización y control inteligente de asistencia y
                alimentación,
                y <strong>System Shadow</strong>, enfocado en la infraestructura de seguridad, trazabilidad y
                sincronización de datos.
                Ambos se combinan para crear una base tecnológica sólida, moderna y conectada.
            </p>

            <div class="grid md:grid-cols-2 gap-10 max-w-4xl mx-auto items-center">

                <!-- S.A.R.A. -->
                <div
                    class="flex flex-col items-center bg-white rounded-xl shadow p-6 hover:shadow-lg transition relative group">
                    <a href="https://soysara.com" target="_blank" class="relative inline-block">
                        <img src="{{asset('imgs/logo-sara-verde.png')}}" alt="S.A.R.A."
                            class="w-40 mb-4 hover:scale-105 transition-transform duration-500">
                        <span class="tooltip">Iniciar sesión en S.A.R.A.</span>
                    </a>
                    <h4 class="text-2xl font-bold text-[#114D58] mb-2">S.A.R.A.</h4>
                    <p class="text-gray-700 text-base leading-relaxed mb-3">
                        El Sistema Automatizado de Registro de Alimentación (S.A.R.A.) fue diseñado para automatizar la
                        asistencia y distribución
                        de alimentos escolares mediante lectores biométricos y códigos QR. Su objetivo es optimizar el
                        control del Programa de
                        Alimentación Escolar (PAE) y garantizar un registro confiable de beneficiarios.
                    </p>
                    <a href="https://soysara.com" target="_blank" class="text-[#114D58] font-semibold hover:underline">
                        Ir a S.A.R.A.
                    </a>
                </div>

                <!-- System Shadow -->
                <div
                    class="flex flex-col items-center bg-white rounded-xl shadow p-6 hover:shadow-lg transition relative group">
                    <a href="systemshadow.online" target="_blank" class="relative inline-block">
                        <img src="{{asset('imgs/system_shadow.png')}}" alt="System Shadow"
                            class="w-40 mb-4 hover:scale-105 transition-transform duration-500">
                        <span class="tooltip">Iniciar sesión en System Shadow</span>
                    </a>
                    <h4 class="text-2xl font-bold text-[#F25041] mb-2">System Shadow</h4>
                    <p class="text-gray-700 text-base leading-relaxed mb-3">
                        System Shadow fue desarrollado para automatizar el registro de asistencia mediante el escaneo de
                        códigos QR y almacenar
                        los datos en una base de datos centralizada. Este sistema mejora la eficiencia, elimina errores
                        humanos y fortalece la
                        infraestructura de control y seguridad en entornos académicos.
                    </p>
                    <a href="https://systemshadow.online" target="_blank"
                        class="text-[#F25041] font-semibold hover:underline">
                        Ir a System Shadow
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- SEGURIDAD -->
    <section id="seguridad" class="max-w-6xl mx-auto px-6 py-16">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <div>
                <h3 class="text-3xl font-semibold text-[#114D58] mb-4">Seguridad y Arquitectura</h3>
                <p class="text-gray-700 mb-4 leading-relaxed">
                    SASHA emplea una arquitectura de tres capas: <strong>datos, sincronización y seguridad</strong>.
                    Su infraestructura está diseñada para mantener la integridad de la información y prevenir accesos no
                    autorizados.
                </p>
                <ul class="list-disc ml-6 text-gray-700 space-y-2">
                    <li>Cifrado AES-256 y conexión segura TLS 1.3.</li>
                    <li>Autenticación distribuida con tokens JWT y U.U.I.D..</li>
                    <li>Auditoría completa de acciones en tiempo real.</li>
                    <li>Escalabilidad modular para diferentes niveles institucionales.</li>
                </ul>
            </div>
            <img src="{{asset('imgs/seguridad.png')}}" alt="Seguridad SASHA"
                class="rounded-xl shadow-md hover:scale-105 transition-transform duration-500">
        </div>
    </section>


    <section id="mision" class="w-full bg-white py-16 px-6 md:px-12 border-t-2 border-[#114D58]">
        <div class="w-full text-center mb-12">
            <h2 class="text-4xl md:text-5xl font-extrabold text-[#114D58]">Misión y Visión</h2>
            <p class="text-lg text-gray-700 mt-4 max-w-3xl mx-auto">
                SASHA representa la convergencia entre automatización y seguridad, fusionando los ideales de
                <span class="text-[#114D58] font-semibold">S.A.R.A.</span>
                y <span class="text-[#F25041] font-semibold">System Shadow</span>
                en una infraestructura digital universal basada en el <strong>U.U.I.D.</strong>.
            </p>
        </div>

        <main class="flex justify-center items-start px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-y-10 gap-x-12 max-w-6xl w-full text-lg md:text-xl">

                <!-- Misión -->
                <div class="group">
                    <div class="flex justify-center mb-4">
                        <div class="bg-[#114D58] text-white font-bold px-8 py-3 rounded-md text-lg md:text-xl shadow-md
                        transition-transform duration-300 ease-out group-hover:-translate-y-5 group-hover:shadow-lg">
                            Misión
                        </div>
                    </div>
                    <div class="border-2 border-[#114D58] bg-teal-50 p-8 rounded-xl
                      transition-transform duration-300 ease-out group-hover:-translate-y-5 group-hover:shadow-xl">
                        <p class="text-gray-800 font-medium leading-relaxed">
                            La misión de <strong>SASHA</strong> es proveer una infraestructura tecnológica unificada,
                            eficiente y segura,
                            que permita la administración de identidades digitales a través del <strong>Identificador
                                Único Universal</strong>,
                            garantizando trazabilidad, interoperabilidad y protección integral de los datos.
                        </p>
                    </div>
                </div>

                <!-- Visión -->
                <div class="group">
                    <div class="flex justify-center mb-4">
                        <div class="bg-[#F25041] text-white font-bold px-8 py-3 rounded-md text-lg md:text-xl shadow-md
                        transition-transform duration-300 ease-out group-hover:-translate-y-5 group-hover:shadow-lg">
                            Visión
                        </div>
                    </div>
                    <div class="border-2 border-[#F25041] bg-red-50 p-8 rounded-xl
                      transition-transform duration-300 ease-out group-hover:-translate-y-5 group-hover:shadow-xl">
                        <p class="text-gray-800 font-medium leading-relaxed">
                            Convertirse en el estándar universal de integración de sistemas automatizados,
                            consolidando un entorno digital confiable donde múltiples plataformas funcionen bajo una
                            sola identidad unificada: el U.U.I.D.
                        </p>
                    </div>
                </div>

            </div>
        </main>
    </section>


    <section class="text-center py-12 bg-gray-50 border-t border-gray-200">
        <h3 class="text-2xl font-semibold text-[#114D58] mb-10">Acceso a los sistemas</h3>

        <div class="flex flex-wrap justify-center gap-16">

            <!-- S.A.R.A. -->
            <div class="relative group flex flex-col items-center">
                <a href="https://soysara.com/" target="_blank" class="relative inline-block">
                    <img src="{{asset('imgs/logo-sara-verde.png')}}" alt="S.A.R.A."
                        class="w-56 md:w-64 hover:scale-110 transition-transform duration-500">
                    <span class="tooltip">Iniciar sesión en S.A.R.A.</span>
                </a>
            </div>

            <!-- System Shadow -->
            <div class="relative group flex flex-col items-center">
                <a href="https://systemshadow.online/" target="_blank" class="relative inline-block">
                    <img src="{{asset('imgs/system_shadow.png')}}" alt="System Shadow"
                        class="w-56 md:w-64 hover:scale-110 transition-transform duration-500">
                    <span class="tooltip">Iniciar sesión en System Shadow</span>
                </a>
            </div>

        </div>
    </section>


    <!-- FOOTER -->
    <footer class="bg-[#114D58] text-white text-center text-base md:text-lg py-5 mt-16">
        ©{{\Carbon\Carbon::now()->year}} - Proyecto SASHA | Integración de S.A.R.A. y System Shadow | COLEGIO O.E.A.
    </footer>

</div>