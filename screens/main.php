<?php
// screens/main.php
?>
            <!-- Tela Principal -->
            <div class="fade-in">
                <div class="header">
                    <div class="header-top">
                        <div class="user-info">
                            <div class="user-avatar">
                                <i class="fas fa-user"></i>
                            </div>
                            <div>
                                <div class="user-greeting">Olá,</div>
                                <div class="user-name">Maria Silva</div>
                            </div>
                        </div>
                        <div class="location-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                    </div>
                    
                    <div class="search-box">
                        <i class="fas fa-search search-icon"></i>
                        <input type="text" class="search-input" placeholder="Buscar especialidade ou sintoma...">
                    </div>
                </div>
                
                <div class="alert-box slide-up">
                    <div class="alert-icon">
                        <i class="fas fa-exclamation-circle"></i>
                    </div>
                    <div class="alert-content">
                        <div class="alert-title">Não pode esperar?</div>
                        <div class="alert-desc">Consultas particulares a partir de R$ 89,90</div>
                    </div>
                    <i class="fas fa-chevron-right"></i>
                </div>
                
                <div class="content">
                    <h2 class="section-title">Como podemos ajudar?</h2>
                    
                    <div class="service-grid">
                        <a href="?screen=specialties" class="service-card">
                            <div class="service-icon"><i class="fas fa-calendar-alt"></i></div>
                            <div class="service-name">Agendar no SUS</div>
                            <div class="service-meta">Gratuito</div>
                        </a>
                        
                        <a href="?screen=fasttrack" class="service-card featured">
                            <div class="service-icon"><i class="fas fa-bolt"></i></div>
                            <div class="service-name">Fast-Track</div>
                            <div class="service-meta">Atendimento rápido</div>
                        </a>
                        
                        <div class="service-card" onclick="alert('Funcionalidade em desenvolvimento')">
                            <div class="service-icon"><i class="fas fa-clock"></i></div>
                            <div class="service-name">Meus Agendamentos</div>
                            <div class="service-meta">3 próximos</div>
                        </div>
                        
                        <div class="service-card" onclick="alert('Funcionalidade em desenvolvimento')">
                            <div class="service-icon"><i class="fas fa-heartbeat"></i></div>
                            <div class="service-name">Minha Saúde</div>
                            <div class="service-meta">Histórico</div>
                        </div>
                    </div>
                    
                    <h3 class="section-title">Especialidades mais buscadas</h3>
                    <div class="specialty-list">
                        <?php foreach ($specialties as $spec): ?>
                            <a href="?screen=detail&specialty=<?php echo urlencode($spec['name']); ?>&wait=<?php echo urlencode($spec['wait']); ?>" class="specialty-item">
                                <div class="specialty-info">
                                    <div class="specialty-icon-box">
                                        <i class="fas fa-<?php echo $spec['icon']; ?>"></i>
                                    </div>
                                    <div>
                                        <div class="specialty-name"><?php echo $spec['name']; ?></div>
                                        <div class="specialty-wait">Espera SUS: <?php echo $spec['wait']; ?></div>
                                    </div>
                                </div>
                                <i class="fas fa-chevron-right specialty-arrow"></i>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
