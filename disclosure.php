<!DOCTYPE HTML>
<!DOCTYPE HTML>
<html lang="en-US">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    
    <?php include 'app/config/front-config.php'; 
    $site_title = "Disclosure | Shri Ram Finance Corporation Pvt. Ltd.";
     $site_description = "Shri Ram Finance Corporation Private Limited is one of Central India's fastest growing NBFCs. Founded by Shri Ganesh Bhattar and leading by Shri Gaurav Bhattar. SRFC was incorporated in April 2004 and was involved in Two wheeler finance."; ?>
    <?php
    $vacancy_sql = "SELECT vacancy_id , job_title, job_title_slug,job_designation, job_timing FROM vacancy ORDER by vacancy_id DESC LIMIT 10";
    $vacancy_row = getData($vacancy_sql);
    ?>
    <?php include 'header.php'; ?>
    
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"
    />

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <style>
      :root {
        --primary-color: #006eae;
        --secondary-color: #007cc4;
        --accent-color: #00a859;
        --light-bg: #f8f9fa;
        --border-color: #e0e0e0;
        --card-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
      }

      body {
        font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f5f7fb;
        color: #333;
        line-height: 1.5;
      }
      
      /* --- REMOVE UNDERLINE FROM ALL LINKS --- */
      a, a:hover, a:focus, a:active {
          text-decoration: none !important;
          outline: none !important;
      }

      .banking-container {
        margin: 0 auto;
        overflow: hidden;
        width: 100%;
      }

      .banking-header {
        background: linear-gradient(
          135deg,
          var(--primary-color) 0%,
          var(--secondary-color) 100%
        );
        color: white;
        padding: 25px 30px;
        border-bottom: 5px solid var(--accent-color);
      }

      .banking-header h1 {
        font-size: 32px;
        font-weight: 600;
        margin: 0 0 5px 0;
      }

      .banking-header .subtitle {
        font-size: 16px;
        opacity: 0.9;
        margin-bottom: 0;
      }

      .tab-content-banking {
        max-width: 1200px;
        padding: 30px;
        margin: 0 auto;
      }

      .section-title {
        color: var(--primary-color);
        font-size: 24px;
        font-weight: 600;
        margin-top: 0;
        margin-bottom: 25px;
        padding-bottom: 12px;
        border-bottom: 2px solid #f0f0f0;
      }

      .financial-card {
        background: white;
        border-radius: 8px;
        border: 1px solid var(--border-color);
        overflow: hidden;
        transition: transform 0.3s, box-shadow 0.3s;
        margin-bottom: 15px;
      }

      .financial-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 16px rgba(0, 0, 0, 0.12);
      }

      .card-header-banking {
        background-color: #f8fafd;
        padding: 18px 25px;
        border-bottom: 1px solid var(--border-color);
        cursor: pointer;
        display: flex;
        justify-content: space-between;
        align-items: center;
        text-decoration: none !important; /* Extra safety */
      }
      
      .card-header-banking:hover, .card-header-banking:focus {
          text-decoration: none !important;
          background-color: #f0f4f8;
      }

      .card-header-banking h4 {
        margin: 0;
        font-size: 18px;
        font-weight: 600;
        color: #333;
        display: flex;
        align-items: center;
      }

      .toggle-icon {
        font-size: 20px;
        font-weight: 300;
        color: #666;
        transition: transform 0.3s;
        margin-left: 10px;
      }

      .card-header-banking[aria-expanded="true"] .toggle-icon {
        transform: rotate(45deg);
        color: var(--accent-color);
      }

      .card-body-banking {
        padding: 25px;
      }

      .report-list-container {
        max-height: 400px;
        overflow-y: auto;
        border: 1px solid #eee;
        border-radius: 6px;
      }

      .report-item {
        padding: 15px 20px;
        border-bottom: 1px solid #f0f0f0;
        display: flex;
        justify-content: space-between;
        align-items: center;
        transition: background-color 0.2s;
        gap: 15px;
      }

      .report-item:hover {
        background-color: #f9fbfe;
      }

      .report-item:last-child {
        border-bottom: none;
      }

      /* Responsive Text Handling */
      .report-title {
        font-weight: 500;
        color: #333;
        flex: 1;
        word-break: break-word;
        padding-right: 10px;
      }

      .pdf-icon {
        color: #e74c3c;
        font-size: 20px;
        flex-shrink: 0;
      }

      .footer-info {
        background-color: #f8fafd;
        padding: 20px;
        border-radius: 6px;
        margin-top: 30px;
        font-size: 14px;
        color: #555;
        border-left: 4px solid var(--accent-color);
      }

      /* RESPONSIVE MEDIA QUERIES */
      @media (max-width: 768px) {
        .banking-header {
          padding: 20px 15px;
        }

        .banking-header h1 {
          font-size: 24px;
        }
        
        .banking-header .subtitle {
          font-size: 14px;
        }

        .tab-content-banking {
          padding: 15px;
        }
        
        .card-header-banking {
            padding: 15px;
        }
        
        .card-header-banking h4 {
            font-size: 16px;
        }
        
        .card-body-banking {
            padding: 15px;
        }
        
        .report-item {
            padding: 12px 15px;
        }
        
        .breadcumb-area {
            padding: 30px 0;
        }
      }
    </style>
    <!--------------------------------------------------->
    <!--Start Header Slider Section -->
    <!--===================================================-->
    <div class="breadcumb-area d-flex align-items-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="breadcumb-content">
                        <h1>Disclosure</h1>
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li> Disclosure</li>
                        </ul>
                    </div>
                </div>
                <div class="britcam-shape">
                    <div class="breadcumb-content upp">
                        <ul>
                            <li><a href="/">Investor Corner</a></li>
                            <li>Disclosure</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="banking-container">
      <!-- Banking Style Header -->
      <div class="banking-header">
        <h1>Investor Corner</h1>
        <p class="subtitle">
          Disclosure Main - Access regulatory disclosures and reports
        </p>
      </div>

      <!-- Tab Content -->
      <div class="tab-content tab-content-banking">
        <!-- Disclosure Main Tab -->
        <div role="tabpanel" class="tab-pane fade in active" id="disclosure-main">
          <h2 class="section-title">Disclosure</h2>

          <!-- 1. Annual Return -->
          <div class="financial-card">
            <div
              class="card-header-banking"
              data-toggle="collapse"
              href="#annualReturn"
              aria-expanded="true"
              aria-controls="annualReturn"
            >
              <h4>
                <i
                  class="fa fa-file-text"
                  style="margin-right: 10px; color: var(--accent-color)"
                ></i>
                Annual Return
              </h4>
              <span class="toggle-icon">+</span>
            </div>
            <div id="annualReturn" class="collapse in">
              <div class="card-body-banking">
                <!-- Report List -->
                <div class="report-list-container">
                     <div class="report-item">
                    <span class="report-title">Annual Return 2025-26</span>
                    <a href="upload/disclosure/annual_return/Annual Return 2025-26.pdf" target="_blank">
                      <i class="fa fa-file-pdf-o pdf-icon"></i>
                    </a>
                  </div>
                  <div class="report-item">
                    <span class="report-title">Annual Return 2024-25</span>
                    <a href="upload/disclosure/annual_return/Annual Return 2024-25.pdf" target="_blank">
                      <i class="fa fa-file-pdf-o pdf-icon"></i>
                    </a>
                  </div>
                  <div class="report-item">
                    <span class="report-title">Annual Return 2023-24</span>
                    <a href="upload/disclosure/annual_return/Annual Return 2023-24.pdf" target="_blank">
                      <i class="fa fa-file-pdf-o pdf-icon"></i>
                    </a>
                  </div>
                  <div class="report-item">
                    <span class="report-title">Annual Return 2022-23</span>
                    <a href="upload/disclosure/annual_return/Annual Return 2022-23.pdf" target="_blank">
                      <i class="fa fa-file-pdf-o pdf-icon"></i>
                    </a>
                  </div>
                  <div class="report-item">
                    <span class="report-title">Annual Return 2021-22</span>
                    <a href="upload/disclosure/annual_return/Annual Return 2021-22.pdf" target="_blank">
                      <i class="fa fa-file-pdf-o pdf-icon"></i>
                    </a>
                  </div>
                  <div class="report-item">
                    <span class="report-title">Annual Return 2021-22</span>
                    <a href="upload/disclosure/annual_return/Annual Return 2020-21.pdf" target="_blank">
                      <i class="fa fa-file-pdf-o pdf-icon"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- 2. Corporate Governance -->
          <div class="financial-card">
            <div
              class="card-header-banking"
              data-toggle="collapse"
              href="#corporateGovernance"
              aria-expanded="false"
              aria-controls="corporateGovernance"
            >
              <h4>
                <i
                  class="fa fa-sitemap"
                  style="margin-right: 10px; color: var(--accent-color)"
                ></i>
                Corporate Governance
              </h4>
              <span class="toggle-icon">+</span>
            </div>
            <div id="corporateGovernance" class="collapse">
              <div class="card-body-banking">
                <!-- Report List -->
                <div class="report-list-container">
                  <div class="report-item">
                    <span class="report-title">AGM Proceedings_30.09.2025</span>
                    <a href="upload/disclosure/corporate_governance/AGM Proceedings_30.09.2025.pdf" target="_blank">
                      <i class="fa fa-file-pdf-o pdf-icon"></i>
                    </a>
                  </div>
                  <div class="report-item">
                    <span class="report-title">Committee Composition</span>
                    <a href="upload/disclosure/corporate_governance/Committee Composition.pdf" target="_blank">
                      <i class="fa fa-file-pdf-o pdf-icon"></i>
                    </a>
                  </div>
                  <div class="report-item">
                    <span class="report-title">Details of Debenture Trustee</span>
                    <a href="upload/disclosure/corporate_governance/Details of Debenture Trustee.pdf" target="_blank">
                      <i class="fa fa-file-pdf-o pdf-icon"></i>
                    </a>
                  </div>
                  <div class="report-item">
                    <span class="report-title">Intimation of AGM_27.09.2025</span>
                    <a href="upload/disclosure/corporate_governance/Intimation of AGM_27.09.2025.pdf" target="_blank">
                      <i class="fa fa-file-pdf-o pdf-icon"></i>
                    </a>
                  </div>
                  
                </div>
              </div>
            </div>
          </div>

          <!-- 3. Credit Rating -->
          <div class="financial-card">
            <div
              class="card-header-banking"
              data-toggle="collapse"
              href="#creditRating"
              aria-expanded="false"
              aria-controls="creditRating"
            >
              <h4>
                <i
                  class="fa fa-star"
                  style="margin-right: 10px; color: var(--accent-color)"
                ></i>
                Credit Rating
              </h4>
              <span class="toggle-icon">+</span>
            </div>
            <div id="creditRating" class="collapse">
              <div class="card-body-banking">
                <!-- Report List -->
                <div class="report-list-container">
                  <div class="report-item">
                    <span class="report-title">Press Release_04.08.2025</span>
                    <a href="upload/disclosure/credit_rating/Press Release_04.08.2025.pdf" target="_blank">
                      <i class="fa fa-file-pdf-o pdf-icon"></i>
                    </a>
                  </div>
                  <div class="report-item">
                    <span class="report-title">SRFC Press Release_09.12.2025</span>
                    <a href="upload/disclosure/credit_rating/SRFC Press Release_09.12.2025.pdf" target="_blank">
                      <i class="fa fa-file-pdf-o pdf-icon"></i>
                    </a>
                  </div>
                 
                </div>
              </div>
            </div>
          </div>

          <!-- 4. Intimation to Stock Exchange -->
          <div class="financial-card">
            <div
              class="card-header-banking"
              data-toggle="collapse"
              href="#intimationStockExchange"
              aria-expanded="false"
              aria-controls="intimationStockExchange"
            >
              <h4>
                <i
                  class="fa fa-exchange"
                  style="margin-right: 10px; color: var(--accent-color)"
                ></i>
                Intimation to Stock Exchange
              </h4>
              <span class="toggle-icon">+</span>
            </div>
            <div id="intimationStockExchange" class="collapse">
              <div class="card-body-banking">
                <!-- Report List -->
                <div class="report-list-container">
                  <div class="report-item">
                    <span class="report-title">Annual Report</span>
                    <a href="upload/disclosure/intimation_to_stock_exchange/Annual Report.pdf" target="_blank">
                      <i class="fa fa-file-pdf-o pdf-icon"></i>
                    </a>
                  </div>
                   <div class="report-item">
                    <span class="report-title">Outcome of the Board Meeting held on May 30, 2026 </span>
                    <a href="upload/disclosure/intimation_to_stock_exchange/Outcome of the Board Meeting held on May 30, 2026

.pdf" target="_blank">
                      <i class="fa fa-file-pdf-o pdf-icon"></i>
                    </a>
                  </div>
                  <div class="report-item">
                    <span class="report-title">Appointment of Secretarial Auditor of the Company</span>
                    <a href="upload/disclosure/intimation_to_stock_exchange/Appointment of Secretarial Auditor of the Company.pdf" target="_blank">
                      <i class="fa fa-file-pdf-o pdf-icon"></i>
                    </a>
                  </div>
                  <div class="report-item">
                    <span class="report-title">Compliances-Half Yearly Report</span>
                    <a href="upload/disclosure/intimation_to_stock_exchange/Compliances-Half Yearly Report" target="_blank">
                      <i class="fa fa-file-pdf-o pdf-icon"></i>
                    </a>
                  </div>
                  <div class="report-item">
                    <span class="report-title">Intimation for closure of Trading window</span>
                    <a href="upload/disclosure/intimation_to_stock_exchange/Intimation for closure of Trading window.pdf" target="_blank">
                      <i class="fa fa-file-pdf-o pdf-icon"></i>
                    </a>
                  </div>
                  <div class="report-item">
                    <span class="report-title">Outcome of the Board Meeting held on November 10, 2025</span>
                    <a href="upload/disclosure/intimation_to_stock_exchange/Outcome of the Board Meeting held on November 10, 2025.pdf" target="_blank">
                      <i class="fa fa-file-pdf-o pdf-icon"></i>
                    </a>
                  </div>
                  <div class="report-item">
                    <span class="report-title">Reg. 50 (1) - Prior intimation about Board meeting</span>
                    <a href="upload/disclosure/intimation_to_stock_exchange/Reg. 50 (1) - Prior intimation about Board meeting.pdf" target="_blank">
                      <i class="fa fa-file-pdf-o pdf-icon"></i>
                    </a>
                  </div>
                  <div class="report-item">
                    <span class="report-title">Reg. 50 (2) Intimation to the Exchange about meeting under 50(2)</span>
                    <a href="upload/disclosure/intimation_to_stock_exchange/Reg. 50 (2) Intimation to the Exchange about meeting under 50(2).pdf" target="_blank">
                      <i class="fa fa-file-pdf-o pdf-icon"></i>
                    </a>
                  </div>
                  <div class="report-item">
                    <span class="report-title">Reg. 52 - Financial Result for the quarter and half year ended Sep 30,2025</span>
                    <a href="upload/disclosure/intimation_to_stock_exchange/Reg. 52 - Financial Result for the quarter and half year ended Sep 30,2025.pdf" target="_blank">
                      <i class="fa fa-file-pdf-o pdf-icon"></i>
                    </a>
                  </div>
                  <div class="report-item">
                    <span class="report-title">Reg. 57 (1) - Certificate of interest payment_INE08E807084_26.10.2025</span>
                    <a href="upload/disclosure/intimation_to_stock_exchange/Reg. 57 (1) - Certificate of interest payment_INE08E807084_26.10.2025.pdf" target="_blank">
                      <i class="fa fa-file-pdf-o pdf-icon"></i>
                    </a>
                  </div>
                  <div class="report-item">
                    <span class="report-title">Reg. 57 (1) - Certificate of interest payment_INE08E807084_26.11.2025</span>
                    <a href="upload/disclosure/intimation_to_stock_exchange/Reg. 57 (1) - Certificate of interest payment_INE08E807084_26.11.2025.pdf" target="_blank">
                      <i class="fa fa-file-pdf-o pdf-icon"></i>
                    </a>
                  </div>
                  <div class="report-item">
                    <span class="report-title">Reg. 57 (1) - Certificate of interest payment_INE08E807084_26.12.2025</span>
                    <a href="upload/disclosure/intimation_to_stock_exchange/Reg. 57 (1) - Certificate of interest payment_INE08E807084_26.12.2025.pdf" target="_blank">
                      <i class="fa fa-file-pdf-o pdf-icon"></i>
                    </a>
                  </div>
                  <div class="report-item">
                    <span class="report-title">Reg. 57 (1) - Certificate of interest payment_INE08E807100_01.11.2025</span>
                    <a href="upload/disclosure/intimation_to_stock_exchange/Reg. 57 (1) - Certificate of interest payment_INE08E807100_01.11.2025.pdf" target="_blank">
                      <i class="fa fa-file-pdf-o pdf-icon"></i>
                    </a>
                  </div>
                  <div class="report-item">
                    <span class="report-title">Reg. 57 (1) - Certificate of interest payment_INE08E807100_01.12.2025</span>
                    <a href="upload/disclosure/intimation_to_stock_exchange/Reg. 57 (1) - Certificate of interest payment_INE08E807100_01.12.2025.pdf" target="_blank">
                      <i class="fa fa-file-pdf-o pdf-icon"></i>
                    </a>
                  </div>
                  <div class="report-item">
                    <span class="report-title">Reg. 57 (1) Certificate of interest payment_INE08E808041_09.10.2025</span>
                    <a href="upload/disclosure/intimation_to_stock_exchange/Reg. 57 (1) Certificate of interest payment_INE08E808041_09.10.2025.pdf" target="_blank">
                      <i class="fa fa-file-pdf-o pdf-icon"></i>
                    </a>
                  </div>
                  <div class="report-item">
                    <span class="report-title">Reg. 57 (1) Certificate of interest payment_INE08E808041_09.11.2025</span>
                    <a href="upload/disclosure/intimation_to_stock_exchange/Reg. 57 (1) Certificate of interest payment_INE08E808041_09.11.2025.pdf" target="_blank">
                      <i class="fa fa-file-pdf-o pdf-icon"></i>
                    </a>
                  </div>
                  <div class="report-item">
                    <span class="report-title">Reg. 57 (1) Certificate of interest payment_INE08E808041_09.12.2025</span>
                    <a href="upload/disclosure/intimation_to_stock_exchange/Reg. 57 (1) Certificate of interest payment_INE08E808041_09.12.2025.pdf" target="_blank">
                      <i class="fa fa-file-pdf-o pdf-icon"></i>
                    </a>
                  </div>
                  <div class="report-item">
                    <span class="report-title">Regulation 60(2) Record Date Interest Payment_INE08E808041</span>
                    <a href="upload/disclosure/intimation_to_stock_exchange/Regulation 60(2) Record Date Interest Payment_INE08E808041.pdf" target="_blank">
                      <i class="fa fa-file-pdf-o pdf-icon"></i>
                    </a>
                  </div>
                  <div class="report-item">
                    <span class="report-title">Regulation 60(2) Record Date Interest Payment_Jan to April 2026</span>
                    <a href="upload/disclosure/intimation_to_stock_exchange/Regulation 60(2) Record Date Interest Payment_Jan to April 2026.pdf" target="_blank">
                      <i class="fa fa-file-pdf-o pdf-icon"></i>
                    </a>
                  </div>
                  <div class="report-item">
                    <span class="report-title">Regulation 60(2) Record Date Interest Payment_Oct to Dec 2025</span>
                    <a href="upload/disclosure/intimation_to_stock_exchange/Regulation 60(2) Record Date Interest Payment_Oct to Dec 2025.pdf" target="_blank">
                      <i class="fa fa-file-pdf-o pdf-icon"></i>
                    </a>
                  </div>
                  <div class="report-item">
                    <span class="report-title">Resignation of Mr. Harsh Kumar Maheshwary as Non-Executive Independent</span>
                    <a href="upload/disclosure/intimation_to_stock_exchange/Resignation of Mr. Harsh Kumar Maheshwary as Non-Executive Independent.pdf" target="_blank">
                      <i class="fa fa-file-pdf-o pdf-icon"></i>
                    </a>
                  </div>
                  <div class="report-item">
                    <span class="report-title">Security Cover certificate for the quarter ended September 30, 2025</span>
                    <a href="upload/disclosure/intimation_to_stock_exchange/Security Cover certificate for the quarter ended September 30, 2025.pdf" target="_blank">
                      <i class="fa fa-file-pdf-o pdf-icon"></i>
                    </a>
                  </div>
                  <div class="report-item">
                    <span class="report-title">Financial Result for the quarter ended December 31,2025</span>
                    <a href="https://docs.google.com/gview?url=https://srfc.org.in/upload/disclosure/Financial Result for the quarter ended December 31,2025.pdf&embedded=true" target="_blank">
                      <i class="fa fa-file-pdf-o pdf-icon"></i>
                    </a>
                  </div>
                  <div class="report-item">
                    <span class="report-title">Security Cover certificate for the quarter ended December 31, 2025</span>
                    <a href="https://docs.google.com/gview?url=https://srfc.org.in/upload/disclosure/Security Cover certificate for the quarter ended December 31, 2025.pdf&embedded=true" target="_blank">
                      <i class="fa fa-file-pdf-o pdf-icon"></i>
                    </a>
                  </div>
                 <div class="report-item">
                    <span class="report-title">Prior Intimation_22nd_AGM</span>
                    <a href="https://docs.google.com/gview?url=https://srfc.org.in/upload/disclosure/Prior Intimation_22nd_AGM.pdf&embedded=true" target="_blank">
                      <i class="fa fa-file-pdf-o pdf-icon"></i>
                    </a>
                  </div>
                  
                </div>
              </div>
            </div>
          </div>

          <!-- 5. Public Disclosure on Liquidity Risk -->
          <div class="financial-card">
            <div
              class="card-header-banking"
              data-toggle="collapse"
              href="#liquidityRisk"
              aria-expanded="false"
              aria-controls="liquidityRisk"
            >
              <h4>
                <i
                  class="fa fa-bar-chart"
                  style="margin-right: 10px; color: var(--accent-color)"
                ></i>
                Public Disclosure on Liquidity Risk
              </h4>
              <span class="toggle-icon">+</span>
            </div>
            <div id="liquidityRisk" class="collapse">
              <div class="card-body-banking">
                <!-- Report List -->
                <div class="report-list-container">
                    <div class="report-item">
                    <span class="report-title">Liquidity Disclosures as per Clause 1.9 of SBR-March-26</span>
                    <a href="upload/disclosure/public _disclosure_on_liquidity_risk/Liquidity Disclosures as per Clause 1.9 of SBR-March-26.pdf" target="_blank">
                      <i class="fa fa-file-pdf-o pdf-icon"></i>
                    </a>
                  </div>
                  <div class="report-item">
                    <span class="report-title">Liquidity Disclosure -SEP 25</span>
                    <a href="upload/disclosure/public _disclosure_on_liquidity_risk/Liquidity Disclosure -SEP 25.pdf" target="_blank">
                      <i class="fa fa-file-pdf-o pdf-icon"></i>
                    </a>
                  </div>
                  <div class="report-item">
                    <span class="report-title">Liquidity Disclosure Format MARCH-24</span>
                    <a href="upload/disclosure/public _disclosure_on_liquidity_risk/Liquidity Disclosure Format MARCH-24.pdf" target="_blank">
                      <i class="fa fa-file-pdf-o pdf-icon"></i>
                    </a>
                  </div>
                  <div class="report-item">
                    <span class="report-title">Liquidity Disclosure Format March-25</span>
                    <a href="upload/disclosure/public _disclosure_on_liquidity_risk/Liquidity Disclosure Format March-25.pdf" target="_blank">
                      <i class="fa fa-file-pdf-o pdf-icon"></i>
                    </a>
                  </div>
                  <div class="report-item">
                    <span class="report-title">Liquidity Disclosure Format Sep-24</span>
                    <a href="upload/disclosure/public _disclosure_on_liquidity_risk/Liquidity Disclosure Format Sep-24.pdf" target="_blank">
                      <i class="fa fa-file-pdf-o pdf-icon"></i>
                    </a>
                  </div>
                  <div class="report-item">
                    <span class="report-title">Liquidity Disclosure Format- June-24</span>
                    <a href="upload/disclosure/public _disclosure_on_liquidity_risk/Liquidity Disclosure Format- June-24.pdf" target="_blank">
                      <i class="fa fa-file-pdf-o pdf-icon"></i>
                    </a>
                  </div>
                  <div class="report-item">
                    <span class="report-title">Liquidity Disclosure Format-Dec-23</span>
                    <a href="upload/disclosure/public _disclosure_on_liquidity_risk/Liquidity Disclosure Format-Dec-23.pdf" target="_blank">
                      <i class="fa fa-file-pdf-o pdf-icon"></i>
                    </a>
                  </div>
                  <div class="report-item">
                    <span class="report-title">Liquidity Disclosure Format-Dec-24</span>
                    <a href="upload/disclosure/public _disclosure_on_liquidity_risk/Liquidity Disclosure Format-Dec-24.pdf" target="_blank">
                      <i class="fa fa-file-pdf-o pdf-icon"></i>
                    </a>
                  </div>
                  <div class="report-item">
                    <span class="report-title">Liquidity Disclosure Format-June -25</span>
                    <a href="upload/disclosure/public _disclosure_on_liquidity_risk/Liquidity Disclosure Format-June -25.pdf" target="_blank">
                      <i class="fa fa-file-pdf-o pdf-icon"></i>
                    </a>
                  </div>
                  <div class="report-item">
                    <span class="report-title">Liquidity Disclosure Format-Dec25</span>
                    <a href="upload/disclosure/public _disclosure_on_liquidity_risk/Liquidity Disclosure Format-Dec25.pdf" target="_blank">
                      <i class="fa fa-file-pdf-o pdf-icon"></i>
                    </a>
                  </div>
                 
              </div>
            </div>
          </div>

          <!-- 6. Quarterly Compliance Report -->
          <div class="financial-card">
            <div
              class="card-header-banking"
              data-toggle="collapse"
              href="#quarterlyCompliance"
              aria-expanded="false"
              aria-controls="quarterlyCompliance">
              <h4>
                <i
                  class="fa fa-check-circle"
                  style="margin-right: 10px; color: var(--accent-color)"
                ></i>
                Quarterly Compliance Report
              </h4>
              <span class="toggle-icon">+</span>
            </div>
            <div id="quarterlyCompliance" class="collapse">
              <div class="card-body-banking">
                <!-- Report List -->
                <div class="report-list-container">
                  <div class="report-item">
                    <span class="report-title">QCR_30.09.2025</span>
                    <a href="upload/disclosure/quarterly_compliance_report/QCR_30.09.2025.pdf" target="_blank">
                      <i class="fa fa-file-pdf-o pdf-icon"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- 7. Statement of Deviation of Variation -->
          <div class="financial-card">
            <div
              class="card-header-banking"
              data-toggle="collapse"
              href="#deviationVariation"
              aria-expanded="false"
              aria-controls="deviationVariation"
            >
              <h4>
                <i
                  class="fa fa-exclamation-triangle"
                  style="margin-right: 10px; color: var(--accent-color)"
                ></i>
                Statement of Deviation of Variation
              </h4>
              <span class="toggle-icon">+</span>
            </div>
            <div id="deviationVariation" class="collapse">
              <div class="card-body-banking">
                <!-- Report List -->
                <div class="report-list-container">
                  <div class="report-item">
                    <span class="report-title">Statement of Deviation of Variation_ September 30,2025.pdf</span>
                    <a href="https://docs.google.com/gview?url=https://srfc.org.in/upload/disclosure/statement_of_deviation_of_variation/Statement of Deviation of Variation_ September 30,2025.pdf" target="_blank">
                      <i class="fa fa-file-pdf-o pdf-icon"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- jQuery and Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <script>
      $(document).ready(function () {
        // Remove the filter button animation code since filters are removed
      });
    </script>
    
    <script>
function openPDF(url) {
  fetch(url)
    .then(res => res.blob())
    .then(blob => {
      const blobUrl = URL.createObjectURL(blob);
      window.open(blobUrl, '_blank');
    })
    .catch(err => console.error(err));
}
</script>
    <!--==================================================-->
    
    <!--------------------------------------------------->
    <?php include 'footer.php'; ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/1.0.0/p5.min.js"></script>
    <script src="assets/js/sweetalert.min.js"></script>      
   


    <?php
    $conn->close();
    ?>
</body>
</html>