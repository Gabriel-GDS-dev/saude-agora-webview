<?php
// screens/fasttrack.php
?>
            <!-- Tela Fast-Track -->
            <div class="fasttrack-screen fade-in">
                <button class="back-button" onclick="window.location.href='?screen=main'">
                    <i class="fas fa-arrow-left"></i> Voltar
                </button>
                
                <div class="fasttrack-header">
                    <div class="fasttrack-icon">
                        <i class="fas fa-bolt"></i>
                    </div>
                    <h1 class="fasttrack-title">Fast-Track</h1>
                    <p class="fasttrack-subtitle">Atendimento rápido quando você mais precisa</p>
                </div>
                
                <div class="symptoms-box slide-up">
                    <h3 class="symptoms-title">O que está sentindo?</h3>
                    <div class="symptoms-grid">
                        <button class="symptom-btn">Febre</button>
                        <button class="symptom-btn">Dor de cabeça</button>
                        <button class="symptom-btn">Tosse</button>
                        <button class="symptom-btn">Dor muscular</button>
                        <button class="symptom-btn">Náusea</button>
                        <button class="symptom-btn">Outros sintomas</button>
                    </div>
                </div>
                
                <div class="immediate-card slide-up" style="animation-delay: 0.2s">
                    <h3 class="immediate-title">Atendimento Imediato</h3>
                    
                    <div class="immediate-option">
                        <div class="immediate-top">
                            <div class="immediate-info">
                                <div class="immediate-icon-box">
                                    <i class="fas fa-video"></i>
                                </div>
                                <div>
                                    <div class="immediate-name">Teleconsulta</div>
                                    <div class="immediate-specialty">Clínico Geral</div>
                                </div>
                            </div>
                            <div class="immediate-price">
                                <div class="immediate-amount">R$ 89,90</div>
                            </div>
                        </div>
                        
                        <div class="immediate-available">
                            <i class="fas fa-clock"></i>
                            <span>Disponível AGORA • 5-15 minutos</span>
                        </div>
                        
                        <button class="btn-connect" onclick="alert('Conectando com médico...')">
                            Conectar com Médico
                        </button>
                    </div>
                    
                    <p class="benefits">
                        ✓ Atestado digital • ✓ Receita válida • ✓ Suporte 24/7
                    </p>
                </div>
            </div>
