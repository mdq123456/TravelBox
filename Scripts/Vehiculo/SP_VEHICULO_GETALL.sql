USE [DBTravelBox]
GO
/****** Object:  StoredProcedure [dbo].[SP_VEHICULO_GETALL]    Script Date: 16/06/2017 19:54:26 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
-- =============================================
-- Author:		<Author,,Name>
-- Create date: <Create Date,,>
-- Description:	<Description,,>
-- =============================================
CREATE PROCEDURE [dbo].[SP_VEHICULO_GETALL]
	AS
BEGIN
	-- SET NOCOUNT ON added to prevent extra result sets from
	-- interfering with SELECT statements.
	SET NOCOUNT ON;

    -- Insert statements for procedure here
	select * 
	 from Vehiculos

END

GO
