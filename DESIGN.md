# DESIGN.md · Mini Loja

> If this file and the code disagree, the code wins until the person decides. Note the conflict under Open questions.

## Product
Catálogo e painel CRUD de componentes eletrônicos (ESP32, Arduino Uno, sensores) construído em PHP e SQLite (Aula 12), com três páginas: página inicial (`index.html`), gestão de produtos (`cadastro.php` / `tela.php`) e diagnóstico do ambiente (`teste.php`). Usado principalmente no computador (desktop) por estudantes e makers. Tarefa principal da tela mais usada (`tela.php`): consultar a lista de produtos e cadastrar, editar ou excluir um item sem fricção.

## Audience and voice
Estudantes de programação e makers (perfil técnico intermediário). Tom direto e preciso: rótulos curtos, linguagem técnica clara, sem textos promocionais ou explicações óbvias (seguindo `unslop-ui`). Idioma: Português do Brasil (`pt-BR`), moeda em Real com duas casas decimais (`R$ 39,90`), algarismos tabulares para alinhamento de preços.

## Mood
Words: clean, sofisticado, preciso.
Never like: dashboard SaaS genérico de IA (gradientes roxos, glows, sombras coloridas, badges decorativos, eyebrow labels, status dots falsos ou excesso de cromo).

## Brand
Paleta: superfícies em papel claro (`#F7F7F5` / `#FFFFFF`), texto em grafite (`#181A1B`), bordas sutis em linhas finas (`rgba(24, 26, 27, 0.12)`) e acento único em verde-petróleo/ardósia (`#0F5C63`). Tipografia: `Inter` (Google Fonts, fallback sans do sistema) para interface e `JetBrains Mono` (fallback mono do sistema) com algarismos tabulares para preços e identificadores técnicos. Sem logotipo gráfico definido; marca tipográfica limpa. Design system source: `style.css`.

## References
- Stripe Dashboard (modo claro) — take: hierarquia limpa de tabela e formulário, respiro generoso e tipografia tabular para valores monetários; avoid: blocos promocionais, gradientes roxos e banners de upsell.

## Constraints
Desktop primeiro (`1280 px`), responsivo para telas menores sem quebra. Apenas modo claro. WCAG AA de contraste, foco visível por teclado e labels explícitos em todos os campos. CSS puro com variáveis (tokens) em um único arquivo compartilhado, zero dependências JavaScript e zero frameworks CSS. Estrutura PHP/SQLite da Aula 12 (`index.html`, `teste.php`, `banco.php`, `cadastro.php`, `tela.php`) mantida 100% fiel. Sem ícones decorativos (apenas texto claro ou controle funcional quando indispensável). Sem animações decorativas (apenas transições de cor/borda de 150ms ease-out).

## Decisions log
- 2026-11-23 — Apenas modo claro — reduz complexidade e mantém a estética de papel/catálogo técnico limpa.
- 2026-11-23 — CSS puro com tokens sem JS e sem alterar a lógica PHP/SQLite — preserva 100% da atividade da Aula 12 e elimina dependências.
- 2026-11-23 — Paleta papel claro + grafite + verde-petróleo/ardósia e referência Stripe Dashboard (claro) — entrega sofisticação sóbria sem cair em clichês de SaaS de IA.
- 2026-11-23 — Tipografia `Inter` + `JetBrains Mono` via Google Fonts com fallback nativo — garante acabamento tipográfico editorial e preços alinhados.
- 2026-11-23 — Fundações aprovadas em `style.css` (tokens por papel, escala 4px, pesos 400–600, 1 ação primária por tela) — centraliza todas as decisões visuais em uma folha única sem cores soltas.
- 2026-11-23 — Tabela de catálogo em `tela.php` com estado vazio, destaque de linha em edição (`is-selected`) e preços tabulares à direita — cobre todos os estados do CRUD mantendo 100% do contrato PHP da Aula 12.

## Open questions
- Nenhuma pendência aberta no momento.
