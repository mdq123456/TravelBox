USE [DBTravelBox]
GO
/****** Object:  StoredProcedure [dbo].[SP_CLIENTE_BUSCARCLIENTE]    Script Date: 20/06/2017 14:52:09 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
-- =============================================
-- Author:		<Author,,Name>
-- Create date: <Create Date,,>
-- Description:	<Description,,>
-- =============================================
ALTER PROCEDURE [dbo].[SP_CLIENTE_BUSCARCLIENTE]
	@codCliente int
	AS
BEGIN
	-- SET NOCOUNT ON added to prevent extra result sets from
	-- interfering with SELECT statements.
	SET NOCOUNT ON;

    -- Insert statements for procedure here
	select
		 codCliente,
		 DNI,
		 [CUIL/CUIT] AS CUIL,
		 Apellidos,
		 Nombres,
		 Telefono,
		 Email,
		 Direccion             
	 from Clientes where codCliente=@codCliente

END
