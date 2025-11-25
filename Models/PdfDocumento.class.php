<?php
    class PdfDocumento {
        public function __construct(private int $id_pdf_documentos=0, private int $documento_id=0, private string $pdf="", private int $assinado=0){}

        public function getIdPdfDocumentos() {
            return $this->id_pdf_documentos;
        }

        public function getDocumentoId() {
            return $this->documento_id;
        }

        public function getPdf() {
            return $this->pdf;
        }

        public function getAssinado() {
            return $this->assinado;
        }

        // --- SETTERS (Métodos para Definir/Alterar Valores) ---

        public function setIdPdfDocumentos( $id_pdf_documentos) {
            $this->id_pdf_documentos = $id_pdf_documentos;
        }

        public function setDocumentoId( $documento_id) {
            $this->documento_id = $documento_id;
        }

        public function setPdf( $pdf) {
            $this->pdf = $pdf;
        }

        public function setAssinado( $assinado) {
            $this->assinado = $assinado;
        }
    }

?>