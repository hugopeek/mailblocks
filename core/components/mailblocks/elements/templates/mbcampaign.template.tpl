<mjml>
    <mj-head>
        <mj-title>[[*pagetitle]]</mj-title>
        <mj-preview>[[*longtitle]]</mj-preview>
        <mj-font name="Montserrat" href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500"></mj-font>
        <mj-attributes>
            <mj-all font-family="Montserrat, Helvetica, Arial, sans-serif"></mj-all>
            <mj-text font-family="Montserrat, Helvetica, Arial, sans-serif" font-weight="400" font-size="16px" color="#000000" line-height="24px"></mj-text>
        </mj-attributes>
        <mj-style>
            @media all and (max-width: 480px) {
                *[style*='right'],
                *[align*='right'] {
                    text-align: center !important;
                }
            }
        </mj-style>
    </mj-head>
    <mj-body>
        <mj-section full-width="full-width" padding-bottom="30px"></mj-section>
        <mj-section background-color="#fff">
            <mj-column vertical-align="middle" width="40%">
                <mj-image width="200px" src="[[++site_url]]assets/img/logo.png" href="[[++site_url]]?ref=[[+alias]]" align="left"></mj-image>
            </mj-column>
            <mj-column vertical-align="middle" width="45%">
                <mj-text padding-right="0px" font-size="12px" color="lightgrey" align="right">Share this content:</mj-text>
            </mj-column>
            <mj-column vertical-align="middle" width="15%">
                <mj-social padding-left="0px" mode="horizontal" align="right">
                    <mj-social-element name="facebook"></mj-social-element>
                    <mj-social-element name="twitter"></mj-social-element>
                </mj-social>
            </mj-column>
        </mj-section>
        [[*content]]
        <mj-section background-color="#333" padding-bottom="50px">
            <mj-column vertical-align="middle" width="40%">
                <mj-image width="200px" src="[[++site_url]][[++logo_path]]" align="left"></mj-image>
            </mj-column>
            <mj-column vertical-align="middle" width="45%">
                <mj-text padding-right="0px" font-size="12px" color="lightgrey" align="right">Share this content:</mj-text>
            </mj-column>
            <mj-column vertical-align="middle" width="15%">
                <mj-social padding-left="0px" mode="horizontal" align="right">
                    <mj-social-element name="facebook"></mj-social-element>
                    <mj-social-element name="twitter"></mj-social-element>
                </mj-social>
            </mj-column>
            <mj-column width="100%">
                <mj-divider border-width="1px" border-style="dashed" border-color="lightgrey"></mj-divider>
                <mj-text color="lightgrey" align="center">[Unsubscribe]</mj-text>
            </mj-column>
        </mj-section>
    </mj-body>
</mjml>