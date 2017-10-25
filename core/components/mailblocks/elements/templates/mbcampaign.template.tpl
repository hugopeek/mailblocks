<mjml>
    <mj-head>
        <mj-title>[[*pagetitle]]</mj-title>
        <mj-preview>[[*longtitle]]</mj-preview>
        <mj-font name="Montserrat" href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500" />
        <mj-attributes>
            <mj-all font-family="Montserrat, Helvetica, Arial, sans-serif" />
            <mj-text font-weight="400" font-size="16" color="#000000" line-height="24px" />
        </mj-attributes>
    </mj-head>
    <mj-body>
        <mj-container background-color="#eee">
            <mj-section full-width="full-width" padding-bottom="30"></mj-section>
            [[*content]]
            <mj-section background-color="#333" padding-bottom="50">
                <mj-column vertical-align="middle" width="40%">
                    <mj-image width="200" src="[[++site_url]]assets/img/logo-inverted.png" align="left" />
                </mj-column>
                <mj-column vertical-align="middle" width="45%">
                    <mj-text padding-right="0" font-size="12" color="lightgrey" align="right">Share this content:</mj-text>
                </mj-column>
                <mj-column vertical-align="middle" width="15%">
                    <mj-social
                            padding-left="0"
                            display="facebook twitter"
                            mode="horizontal"
                            text-mode="false"
                            align="right"
                    />
                </mj-column>
                <mj-column width="100%">
                    <mj-divider border-width="1px" border-style="dashed" border-color="lightgrey" />
                    <mj-text color="lightgrey" align="center">[Unsubscribe]</mj-text>
                </mj-column>
            </mj-section>
        </mj-container>
    </mj-body>
</mjml>
